<?php 
require_once __DIR__ . '/../../controllers/HomeController.php';

// Khởi tạo controller
$homeController = new HomeController();

// Xử lý tìm kiếm
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['category_name'] ?? '';
    if (!empty($categoryName)) {
        $searchResults = $homeController->searchNewsByCategoryName($categoryName);
    }
} else {
    $newsList = $homeController->getNews();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Tin Tức</title>
    <link rel="stylesheet" href="/path/to/your/css/style.css"> <!-- Thay thế với đường dẫn tới CSS của bạn -->
</head>
<body>
    <div class="container">
        <h1>Danh Sách Tin Tức</h1>

        <!-- Form tìm kiếm -->
        <form action="" method="POST">
            <input type="text" name="category_name" placeholder="Tìm kiếm theo danh mục...">
            <button type="submit">Tìm kiếm</button>
        </form>

        <!-- Hiển thị kết quả tìm kiếm -->
        <?php if (!empty($searchResults)): ?>
            <h2>Kết quả tìm kiếm</h2>
            <ul class="news-list">
                <?php foreach ($searchResults as $news): ?>
                    <li>
                        <h2><?= htmlspecialchars($news['title']) ?></h2>
                        <a href="/views/news/detail.php?id=<?= urlencode($news['id']) ?>">Xem chi tiết</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <ul class="news-list">
                <?php foreach ($newsList as $news): ?>
                    <li>
                        <h2><?= htmlspecialchars($news['title']) ?></h2>
                        <a href="/views/news/detail.php?id=<?= urlencode($news['id']) ?>">Xem chi tiết</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>