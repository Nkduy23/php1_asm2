<h2>Thêm sản phẩm</h2>
<form action="?page=addpro" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="price">Giá</label>
        <input type="text" name="price" required>
    </div>
    <div>
        <label for="type">Loại sản phẩm</label>
        <select name="type" id="type" required>
            <option value="regular">Regular</option>
            <option value="sale">Sale</option>
        </select>
    </div>
    <div id="saleFields" style="display: none;">
        <div>
            <label for="salePercent">Giá khuyến mãi (%)</label>
            <input type="text" name="salePercent">
        </div>
        <div>
            <label for="progress">Tiến độ</label>
            <input type="number" name="progress" min="0" max="100">
        </div>
    </div>
    <div>
        <label for="image">Hình ảnh</label>
        <input type="file" name="image" required>
    </div>
    <div>
        <label for="colors">Màu sắc (JSON)</label>
        <input type="text" name="colors" placeholder='["Màu 1", "Màu 2"]' required>
    </div>
    <div>
        <label for="category">Danh mục</label>
        <select name="category" required>
            <option value="sale">Sale</option>
            <option value="shoesForWomen">Giày nữ</option>
            <option value="bags">Túi xách</option>
            <option value="shoesForMen">Giày nam</option>
            <option value="depSandal">Dép/Sandal</option>
        </select>
    </div>
    <div>
        <button type="submit">Thêm</button>
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