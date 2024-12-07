<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage News</title>
</head>
<body>
    <h1> QUẢN LÝ TIN TỨC </h1>
    <a href="index.php?controller=news&action=add">Add News</a>
    <table border="1">
    <thead>
        <tr>
            <th> ID </th>
            <th> Tiêu đề </th>
            <th> Nội dung </th> 
            <th> Loại </th>
            <th> Ngày tạo </th>
            <th> Hành động </th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?= htmlspecialchars($news['id']) ?></td>
                    <td><?= htmlspecialchars($news['title']) ?></td>
                    <td><?= htmlspecialchars($news['content']) ?></td>
                    <td><?= htmlspecialchars($news['category_name']) ?></td>
                    <td><?= htmlspecialchars($news['created_at']) ?></td>
                    <td>
                        <a href="index.php?controller=news&action=edit&id=<?= $news['id'] ?>">Sửa</a>
                        <a href="index.php?controller=news&action=delete&id=<?= $news['id'] ?>" onclick="return confirm('Xác nhận xoá?')">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6"> No news available </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>