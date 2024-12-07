
<!-- views/admin/news/edit.php -->
<h2>Sửa Tin Tức</h2>
<form method="POST" action="">
    <div>
        <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($news['title']) ?>" required>
    </div>
    <div>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" required><?= htmlspecialchars($news['content']) ?></textarea>
    </div>
    <div>
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $news['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit">Lưu</button>
        <a href="index.php?controller=news&action=index">Hủy</a>
    </div>
</form>