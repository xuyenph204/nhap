<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Quản trị viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Chào mừng, <?= $_SESSION['admin_username'] ?>!</h2>
        <a href="index.php?controller=admin&action=logout" class="btn btn-danger mt-3">Đăng xuất</a>
        <div class="mt-5">
            <h3>Quản lý tin tức</h3>
            <a href="index.php?controller=admin&action=manage_news" class="btn btn-success">Quản lý tin tức</a>
        </div>
    </div>
</body>
</html>