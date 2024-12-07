<?php
require_once 'models/Database.php';  // Đảm bảo rằng đường dẫn chính xác

class User {
    
    public static function getByUsername($username) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>