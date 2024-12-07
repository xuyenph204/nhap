<h1>Add News</h1>
<form method="POST">
    <label>Tiêu đề :</label><br>
    <input type="text" name="title" required><br><br>

    <label> Nội dung :</label><br>
    <textarea name="content" required></textarea><br><br>

    <label> URL Ảnh:</label><br>
    <input type="text" name="image"><br><br>

    <label> Loại :</label><br>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit"> Thêm </button>
</form>