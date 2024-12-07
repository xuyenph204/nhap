<?php
// models/News.php
require_once 'Database.php';

class News {
    public function getAllNews() {
        try {
            $conn = Database::connect();
            $sql = "SELECT news.id, news.title, news.content, categories.name AS category_name, news.created_at
                    FROM news
                    JOIN categories ON news.category_id = categories.id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null; // Đóng kết nối
            return $newsList;
        } catch (PDOException $e) {
            // Xử lý lỗi
            die("Lỗi khi truy xuất tin tức: " . $e->getMessage());
        }
    }

    public function getNewsById($id) {
        try {
            $conn = Database::connect();
            $sql = "SELECT news.*, categories.name AS category_name 
                    FROM news 
                    JOIN categories ON news.category_id = categories.id 
                    WHERE news.id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $news = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null; // Đóng kết nối
            
            // Kiểm tra nếu không tìm thấy tin tức
            if (!$news) {
                return false;
            }

            return $news;
        } catch (PDOException $e) {
            die("Lỗi khi truy xuất tin tức: " . $e->getMessage());
        }
    }

    // Tạo tin tức mới
    public function createNews($title, $content, $category_id) {
        try {
            $conn = Database::connect();
            $sql = "INSERT INTO news (title, content, category_id, created_at) VALUES (:title, :content, :category_id, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':category_id', $category_id);
            $result = $stmt->execute();
            $conn = null; 
            return $result;
        } catch (PDOException $e) {
            die("Lỗi khi tạo tin tức: " . $e->getMessage());
        }
    }

    // Cập nhật 
    public function updateNews($id, $title, $content, $category_id) {
        try {
            $conn = Database::connect();
            $sql = "UPDATE news SET title = :title, content = :content, category_id = :category_id WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $conn = null; // Đóng kết nối
            return $result;
        } catch (PDOException $e) {
            die("Lỗi khi cập nhật tin tức: " . $e->getMessage());
        }
    }

    // Xóa
    public function deleteNews($id) {
        try {
            $conn = Database::connect();
            $sql = "DELETE FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $conn = null; // Đóng kết nối
            return $result;
        } catch (PDOException $e) {
            die("Lỗi khi xóa tin tức: " . $e->getMessage());
        }
    }
}