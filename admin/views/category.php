<h2>Quản lý danh mục</h2>

<!-- Form thêm danh mục -->
<form method="POST" action="index.php?page=storecategory">
    <input type="text" name="name" placeholder="Tên danh mục" required>
    <button type="submit">Thêm danh mục</button>
</form>

<!-- Danh sách danh mục -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td>
                <a href="?page=editcategory&id=<?= $category['id'] ?>"><button>Sửa</button></a>
                <a href="?page=deletecategory&id=<?= $category['id'] ?>" onclick="return confirmDelete();"><button>Xóa</button></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
function confirmDelete() {
    return confirm("Bạn có chắc muốn xóa danh mục này?");
}
</script>
