<h2>Chỉnh sửa sản phẩm</h2>
<form action="?page=editpro" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="hidden" name="current_image" value="<?= $product['image'] ?>">
    <div>
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" value="<?= $product['name'] ?>" required>
    </div>
    <div>
        <label for="price">Giá</label>
        <input type="text" name="price" value="<?= $product['price'] ?>" required>
    </div>
    <div>
        <label for="type">Loại sản phẩm</label>
        <select name="type" id="type" required>
            <option value="sale" <?= $product['type'] === 'sale' ? 'selected' : '' ?>>Sale</option>
            <option value="regular" <?= $product['type'] === 'regular' ? 'selected' : '' ?>>Regular</option>
        </select>
    </div>
    <div id="saleFields" style="display: <?= $product['type'] === 'sale' ? 'block' : 'none' ?>;">
        <div>
            <label for="salePercent">Giá khuyến mãi (%)</label>
            <input type="text" name="salePercent" value="<?= $product['salePercent'] ?? '' ?>">
        </div>
        <div>
            <label for="progress">Tiến độ</label>
            <input type="number" name="progress" min="0" max="100" value="<?= $product['progress'] ?? 0 ?>">
        </div>
    </div>
    <div>
        <label for="HinhAnh">Hình ảnh</label>
        <input type="file" name="HinhAnh">
        <img src="../public/img/<?= $product['type'] === 'sale' ? 'sale/' : 'regular/' ?><?= $product['image'] ?>" width="100px" alt="Ảnh sản phẩm">
    </div>
    <div>
    <label for="colors">Màu sắc (JSON)</label>
    <input type="text" name="colors" value='<?= $product['colors'] ?>' required>
    </div>
    <div>
        <label for="category">Danh mục</label>
        <select name="category" required>
            <option value="sale" <?= $product['category'] === 'sale' ? 'selected' : '' ?>>Sale</option>
            <option value="shoesForWomen" <?= $product['category'] === 'shoesForWomen' ? 'selected' : '' ?>>Giày nữ</option>
            <option value="bags" <?= $product['category'] === 'bags' ? 'selected' : '' ?>>Túi xách</option>
            <option value="shoesForMen" <?= $product['category'] === 'shoesForMen' ? 'selected' : '' ?>>Giày nam</option>
            <option value="depSandal" <?= $product['category'] === 'depSandal' ? 'selected' : '' ?>>Dép/Sandal</option>
        </select>
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>

<script>
    // Hiển thị/ẩn trường salePercent và progress dựa trên loại sản phẩm
    document.getElementById('type').addEventListener('change', function() {
        const saleFields = document.getElementById('saleFields');
        if (this.value === 'sale') {
            saleFields.style.display = 'block';
        } else {
            saleFields.style.display = 'none';
        }
    });
</script>