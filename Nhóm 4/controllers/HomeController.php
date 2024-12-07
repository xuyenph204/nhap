<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/News.php';

class HomeController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getCategories() {
        $categoryModel = new Category($this->db);
        return $categoryModel->getAllCategories();
    }

    public function getNews() {
        $newsModel = new News($this->db);
        return $newsModel->getAllNews();
    }
    public function getNewsById($id) {
        $newsModel = new News($this->db);
        return $newsModel->getNewsById($id);
    }
    
    public function searchNewsByCategoryName($categoryName) {
        $query = "SELECT news.id, news.title, news.content, news.image, news.created_at, categories.name as category_title 
                  FROM news 
                  JOIN categories ON news.category_id = categories.id 
                  WHERE categories.name LIKE :categoryName 
                  ORDER BY news.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':categoryName', '%' . $categoryName . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function __destruct() {
        Database::disconnect();
    }
}