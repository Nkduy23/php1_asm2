<h2>Quản lý sản phẩm</h2>
<a href="?page=addpropage"><button>Thêm sản phẩm</button></a>
<table>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Giá sale</th>
        <th>Hình ảnh</th>
        <th>Loại</th>
        <th>Danh mục</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach($products as $key => $product){ ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['salePercent'] ?>%</td>
            <td>
            <?php if ($product['type'] === 'sale'): ?>
                <img src="../public/img/sale/<?= $product['image'] ?>" width="100px" alt="<?= $product['name'] ?>">
            <?php else: ?>
                <img src="../public/img/regular/<?= $product['image'] ?>" width="100px" alt="<?= $product['name'] ?>">
            <?php endif; ?>
            </td>
            <td><?= $product['type'] ?></td>
            <td><?= $product['category'] ?></td>
            <td>
                <a href="?page=editpropage&id=<?= $product['id'] ?>"><button>Sửa</button></a>
                <a href="?page=deletepro&id=<?= $product['id'] ?>" onclick="return confirmDelete()"><button>Xóa</button></a>
            </td>
        </tr>
    <?php } ?>
</table>

<script>
function confirmDelete() {
    return confirm("Bạn có chắc muốn xóa không?");
}
</script>