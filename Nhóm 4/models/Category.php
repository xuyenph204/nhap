<?php
// models/Category.php
require_once 'Database.php';

class Category {
    public function getAllCategories() {
        $conn = Database::connect();
        $sql = "SELECT * FROM categories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}