<?php
require_once __DIR__ . '/../../controllers/HomeController.php';

// Khởi tạo controller
$homeController = new HomeController();

// Lấy tin tức chi tiết
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $newsDetail = $homeController->getNewsById($newsId);

    if ($newsDetail === false) {
        die("Tin tức không tồn tại.");
    }
} else {
    die("ID tin tức không hợp lệ.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Tin Tức</title>
    <link rel="stylesheet" href="/path/to/your/css/style.css"> <!-- Thay thế với đường dẫn tới CSS của bạn -->
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($newsDetail['title']) ?></h1>
        <div class="news-content">
            <img src="<?= htmlspecialchars($newsDetail['image']) ?>" alt="<?= htmlspecialchars($newsDetail['title']) ?>">
            <p><?= htmlspecialchars($newsDetail['content']) ?></p>
            <p><strong>Ngày đăng:</strong> <?= htmlspecialchars($newsDetail['created_at']) ?></p>
            <p><strong>Danh mục:</strong> <?= htmlspecialchars($newsDetail['category_name']) ?></p>
        </div>
    </div>
</body>
</html>