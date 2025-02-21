<select name="category_id">
    <?php foreach ($categories as $category): ?>
        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
    <?php endforeach; ?>
</select>
