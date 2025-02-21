<div class="container-main">
    <section class="product-detail d-grid">
        <div class="product-detail__gallery d-grid">
            <!-- Hiển thị ảnh chính -->
            <img class="product-detail__image" src="../public/img/sale/<?php echo $productDetail['images']; ?>" alt="Product Image" />
            
            <!-- Hiển thị các ảnh thumbnails -->
            <div class="product-detail__thumbnails d-grid">
                <?php foreach ($productDetail['thumbnails'] as $thumbnail): ?>
                    <img class="product-detail__thumbnail" src="../public/img/sale/<?php echo $thumbnail; ?>" alt="Thumbnail" />
                <?php endforeach; ?>
            </div>
        </div>
        <div class="product-detail__info">
            <!-- Hiển thị tên sản phẩm -->
            <h1 class="product-detail__title"><?php echo $productDetail['name']; ?></h1>
            
            <!-- Hiển thị đánh giá, lượt xem và lượt thích -->
            <div class="product-detail__rating d-flex align-center">
                <div class="product-detail__stars"><?php echo $productDetail['rating']; ?> ★</div>
                <p class="product-detail__reviews"><?php echo $productDetail['reviews']; ?> reviews</p>
                <p class="product-detail__likes"><?php echo $productDetail['likes']; ?> likes</p>
            </div>
            
            <!-- Hiển thị giá và giá đã giảm bằng cách tính toán --> 
            <p class="product-detail__price">
                <?php 
                    // Loại bỏ dấu phân cách nếu có và chuyển về số nguyên
                    $originalPrice = (int) str_replace([',', '₫'], '', $productDetail['price']);
                    $salePercent = (int) $productDetail['salePercent'];

                    // Tính giá sau khi giảm
                    $discountedPrice = $originalPrice * (1 - $salePercent / 100);
                ?>

                <span class="product-detail__price-original">
                    <?php echo number_format($originalPrice, 0, ',', '.'); ?>₫ 
                </span>
                <span class="product-detail__price-discounted">
                    <?php echo number_format($discountedPrice, 0, ',', '.'); ?>₫
                </span>
            </p>
            
                    <!-- flash sale -->
        <div class="flash-sale d-flex align-center" role="region" aria-labelledby="flashSaleTitle">
            <div class="flash-sale__timer d-flex" aria-live="countdown">
                <div class="flash-sale__timer-box">
                <span id="days" class="flash-sale__timer-value">00</span>
                </div>
                <div class="flash-sale__timer-box">
                <span id="hours" class="flash-sale__timer-value">00</span>
                </div>
                <div class="flash-sale__timer-box">
                <span id="minutes" class="flash-sale__timer-value">00</span>
                </div>
                <div class="flash-sale__timer-box">
                <span id="seconds" class="flash-sale__timer-value">00</span>
                </div>
            </div>
        </div>

            <!-- Hiển thị mô tả sản phẩm -->
            <p class="product-detail__description"><?php echo $productDetail['description']; ?></p>

            <!-- Hiển thị lựa chọn màu sắc -->
            <div class="product-detail__color-selection d-flex align-center">
                <h4>Chọn Màu:</h4>
                <div class="product-detail__color-options d-flex">
                    <?php foreach ($productDetail['colors'] as $color): ?>
                        <button class="product-detail__color-option" style="background-color: <?php echo $color; ?>;"></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Hiển thị lựa chọn kích thước -->
            <div class="product-detail__size-selection d-flex align-center">
                <h4>Chọn Size:</h4>
                <div class="product-detail__size-options d-flex">
                    <?php foreach ($productDetail['sizes'] as $size): ?>
                        <div class="product-detail__size-option"><?php echo $size; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Chọn số lượng -->
            <div class="product-detail__quantity-selection d-flex align-center">
                <h4>Chọn Số Lượng:</h4>
                <div class="product-detail__quantity-options d-flex align-center">
                    <button class="product-detail__quantity-button">-</button>
                    <span class="product-detail__quantity-value">1</span>
                    <button class="product-detail__quantity-button">+</button>
                </div>
            </div>

            <!-- Các nút thêm vào giỏ hàng và mua ngay -->
            <div class="product-detail__actions">
                <button class="product-detail__add-to-cart">Thêm vào giỏ hàng</button>
                <button class="product-detail__buy-now">Mua ngay</button>
            </div>

            <!-- Hiển thị thông số kỹ thuật -->
            <h3 class="product-detail__specifications-title">Thông số sản phẩm</h3>
            <ul class="product-detail__specifications">
                <?php foreach ($productDetail['specifications'] as $key => $value): ?>
                    <li><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>

            <!-- Hiển thị các lợi ích -->
            <div class="product-detail__benefits">
                <div class="product-detail__benefits-row d-flex align-center">
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit1.jpg" alt="Bảo hành keo vĩnh viễn" />
                        <p>Bảo hành keo vĩnh viễn</p>
                    </div>
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit2.jpg" alt="Miễn phí vận chuyển" />
                        <p>Miễn phí vận chuyển toàn quốc<br />cho đơn hàng từ 150k</p>
                    </div>
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit3.jpg" alt="Đổi hàng trong 60 ngày" />
                        <p>Đổi hàng trong 60 ngày</p>
                    </div>
                </div>
                <div class="product-detail__benefits-row d-flex align-center">
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit4.jpg" alt="Đổi trả dễ dàng" />
                        <p>Đổi trả dễ dàng<br />(trong vòng 7 ngày nếu lỗi nhà sản xuất)</p>
                    </div>
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit5.jpg" alt="Hotline hỗ trợ" />
                        <p>Hotline 1900.633.349<br />hỗ trợ từ 8h30-21h30</p>
                    </div>
                    <div class="product-detail__benefit-item">
                        <img src="../public/img/benefit/benefit6.jpg" alt="Giao hàng tận nơi" />
                        <p>Giao hàng tận nơi,<br />nhận hàng xong thanh toán</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Thông tin chi tiết và Bình luận -->
    <section class="product-tabs">
        <div class="product-tabs__header d-flex">
            <button class="tab-btn active" data-tab="details">Thông tin chi tiết</button>
            <button class="tab-btn" data-tab="reviews">Bình luận</button>
        </div>
        <div class="product-tabs__content">
            <div id="details" class="tab-content active">
                <h2 class="product-detail__detailed-info-title"><?php echo $productDetail['detailed_title']; ?></h2>
                <p class="product-detail__detailed-description"><?php echo $productDetail['describer'][0]; ?></p>
                <h2>Chi Tiết Sản Phẩm</h2>
                <div class="product-detail__detailed-info">
                    <?php foreach ($productDetail['detailed_info'] as $key => $value): ?>
                        <p><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="reviews" class="tab-content">
                <h2>Bình luận</h2>
                <p>Khu vực bình luận của người mua sẽ được hiển thị ở đây.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabButtons = document.querySelectorAll(".tab-btn");
            const tabContents = document.querySelectorAll(".tab-content");

            tabButtons.forEach((btn) => {
                btn.addEventListener("click", function () {
                    tabButtons.forEach((b) => b.classList.remove("active"));
                    tabContents.forEach((content) => content.classList.remove("active"));

                    this.classList.add("active");
                    document.getElementById(this.dataset.tab).classList.add("active");
                });
            });
        });
    </script>

    <!-- Section: Sản phẩm liên quan -->
    <section class="related-products">
        <h2>Có Thể Bạn Cũng Thích</h2>
        <div class="related-products__grid d-grid">
            <a href="/views/detail/saleDetail.html?id=sale2&category=sale">
                <div class="product-item">
                    <img src="../public/img/sale/sale1-Bisque.jpg" alt="Sản phẩm 1" />
                    <p>Dép Nữ MWC - 8136 Dép Nữ Quai Ngang Cách Điệu Dép Nữ Đế Bệt Mũi Vuông Hot Trend</p>
                </div>
            </a>
            <div class="product-item">
                <img src="../public/img/sale/sale2-Black.jpg" alt="Sản phẩm 2" />
                <p>Dép nữ MWC - 8173 Dép Nữ Đế Bánh Mì Cao 4cm,Dép Nữ Quai Chéo Lót Dán Siêu Êm Chân Thời Trang Trẻ Trung Thanh Lịch</p>
            </div>
            <div class="product-item">
                <img src="../public/img/sale/sale3-Gold.jpg" alt="Sản phẩm 3" />
                <p>Dép nam MWC - 7741 Dép Nam Quai Ngang Phối Màu In Chữ Nổi Bật Cực Đẹp, Dép Nam Kiểu Dáng Thời Trang, Đi Êm Chân, Mẫu Mới</p>
            </div>
            <div class="product-item">
                <img src="../public/img/sale/sale4-DarkGoldenRod.jpg" alt="Sản phẩm 4" />
                <p>Dép Nữ MWC 8347 - Dép Nữ Quai Ngang Bản To Nhún Cách Điệu, Dép Đế Đúc 3cm Năng Động,Trẻ Trung, Thời Trang.</p>
            </div>
        </div>
    </section>
</div>

<script>
const productImages = document.querySelectorAll(".product-detail__thumbnail");
const mainImage = document.querySelector(".product-detail__image");

productImages.forEach((image) => {
    image.addEventListener("mouseover", function () {
        mainImage.src = this.src;
    });
});
</script>