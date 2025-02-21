<?php
$category = $this->categoryModel->getCategoryById($_GET['id']);
?>

<h2>Sửa danh mục</h2>
<form method="POST" action="index.php?page=updatecategory">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <input type="text" name="name" value="<?= $category['name'] ?>" required>
    <button type="submit">Cập nhật</button>
</form>
