<!-- slider -->
<div class="slider-container" aria-label="Image Slider">
    <button class="slider__prev-button" aria-label="Previous Slide">❮</button>
    <div class="slider" role="list" aria-label="Image List" aria-live="polite">
        <?php 
        $images = [
            'slider-pc-1.jpg', 'slider-pc-2.jpg', 'slider-pc-3.jpg', 'slider-pc-4.jpg', 'slider-pc-0.jpg'
        ];
        foreach ($images as $image) : ?>
            <div class="slider__item">
                <img
                    class="slider__image"
                    src="../public/img/sliders/<?= $image ?>"
                    data-large="../public/img/sliders/<?= $image ?>"
                    data-small="../public/img/sliders/<?= str_replace("pc", "mb", $image) ?>"
                    alt="Slider Image"
                    draggable="false"
                    role="listitem"
                />
            </div>
        <?php endforeach; ?>
    </div>
    <button class="slider__next-button" aria-label="Next Slide">❯</button>
</div>


<!-- flash sale -->
<div class="flash-sale d-flex align-center" role="region" aria-labelledby="flashSaleTitle">
    <div class="flash-sale__header">
    <h1 id="flashSaleTitle" class="flash-sale__title">F<i class="fa-solid fa-bolt-lightning"></i>ASH SALE</h1>
    </div>
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

<div class="container-main">
    <!-- Flash Sale Section -->
    <section class="home__flash-sale d-flex d-flex-column align-center" aria-label="Flash Sale">
    <div id="flash-sale-products" class="product-list">
        <?php foreach ($flashSaleProducts as $product): ?>
            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                <div class="product-card__image-wrapper">
                    <a href="index.php?page=detail&product_id=<?= $product['id'] ?>">
                        <img src="../public/img/sale/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-card__image" />
                    </a>
                    <!-- Sale Label -->
                    <?php if ($product['type'] === 'sale'): ?>
                        <div class="product-card__sale-label" data-sale="<?= $product['salePercent'] ?>" aria-label="Sale <?= $product['salePercent'] ?>">
                            Sale <?= $product['salePercent'] ?>%
                        </div>
                    <?php endif; ?>
                    <!-- Color Options -->
                    <?php if (!empty($product['colors']) && is_array($product['colors'])): ?>
                        <div class="product-card__color-options">
                            <?php foreach ($product['colors'] as $color): ?>
                                <span class="product-card__color" data-color="<?= $color ?>" style="background-color: <?= $color ?>;" aria-describedby="<?= $color ?>">
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="product-card__color-options">
                            <span class="product-card__no-color">Không có màu sắc</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="product-card__info">
                    <h3 class="product-card__title"><?= $product['name'] ?></h3>
                    <?php

                    $price = preg_replace('/[^0-9]/', '', $product['price']);
                    $price = (float)$price;

                    if (is_numeric($price) && $price > 0) {
                        $salePercent = isset($product['salePercent']) && is_numeric($product['salePercent']) ? (float)$product['salePercent'] : 0;

                        $discountedPrice = $salePercent > 0 ? $price * (1 - $salePercent / 100) : $price;
                    ?>
                        <p class="product-card__price">
                            <span class="product-card__price-original"><?= number_format($price, 0, ',', '.') ?> đ</span>
                            <?php if ($salePercent > 0): ?>
                                <span class="product-card__price-discounted"><?= number_format($discountedPrice, 0, ',', '.') ?> đ</span>
                            <?php endif; ?>
                        </p>
                    <?php } else { ?>
                        <p class="product-card__price">
                            <span class="product-card__price-original">Giá không hợp lệ</span>
                        </p>
                    <?php } ?>
                    <!-- Progress Bar -->
                    <?php if ($product['type'] === 'sale' && isset($product['progress'])): ?>
                        <div class="product-card__progress" role="progressbar" aria-valuenow="<?= $product['progress'] ?>" aria-valuemin="0" aria-valuemax="100" aria-label="Progress bar">
                            <span class="product-card__progress-label"> Đã bán <?= $product['progress'] ?>%</span>
                            <div class="product-card__progress-bar" style="width: <?= $product['progress'] ?>%" data-progress="<?= $product['progress'] ?>"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="?page=sale" class="home__see-all-btn" id="sale-category">Xem tất cả</a>
</section>

    <!-- Regular Products Section -->
    <section class="home__regular-products" aria-label="Regular Products">
        <div id="regular-products" class="product-list">
            <!-- Giày Cao Gót Nữ -->
            <div id="shoes-for-women" class="category-border d-flex d-flex-column align-center">
                <h3 class="category-title">Giày Cao Gót Nữ</h3>
                <div class="category-list">
                    <?php foreach ($regularProducts as $product): ?>
                        <?php if ($product['category'] == 'shoesForWomen'): ?>
                            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                                <div class="product-card__image-wrapper">
                                    <a href="/views/detail/<?= $product['type'] ?>-detail.html?id=<?= $product['id'] ?>&category=<?= $product['category'] ?>">
                                    <img src="../public/img/regular/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-card__image" />
                                    </a>
                                    <!-- Color Options -->
                                    <?php if (!empty($product['colors']) && is_array($product['colors'])): ?>
                                    <div class="product-card__color-options">
                                    <?php foreach ($product['colors'] as $color): ?>
                                    <span class="product-card__color" data-color="<?= $color ?>" style="background-color: <?= $color ?>" aria-describedby="<?= $color ?>"> </span>
                                    <?php endforeach; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="product-card__color-options">
                                    <span class="product-card__no-color">Không có màu sắc</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-card__info">
                                    <h3 class="product-card__title"><?= $product['name'] ?></h3>
                                    <!-- Price Section -->
                                    <p class="product-card__price">
                                    <span class="product-card__price-regular"><?= $product['price'] ?></span>
                                    </p>
                                </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a href="?page=shoesForWomen" class="home__see-all-btn">Xem tất cả</a>
            </div>

            <!-- Bags -->
            <div id="bags" class="category-border d-flex d-flex-column align-center">
                <h3 class="category-title">Balo Thời Trang</h3>
                <div class="category-list">
                    <?php foreach ($regularProducts as $product): ?>
                        <?php if ($product['category'] == 'bags'): ?>
                            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                                <div class="product-card__image-wrapper">
                                    <a href="/views/detail/<?= $product['type'] ?>-detail.html?id=<?= $product['id'] ?>&category=<?= $product['category'] ?>">
                                    <img src="../public/img/regular/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-card__image" />
                                    </a>
                                    <!-- Color Options -->
                                    <?php if (!empty($product['colors']) && is_array($product['colors'])): ?>
                                    <div class="product-card__color-options">
                                    <?php foreach ($product['colors'] as $color): ?>
                                    <span class="product-card__color" data-color="<?= $color ?>" style="background-color: <?= $color ?>" aria-describedby="<?= $color ?>"> </span>
                                    <?php endforeach; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="product-card__color-options">
                                    <span class="product-card__no-color">Không có màu sắc</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-card__info">
                                    <h3 class="product-card__title"><?= $product['name'] ?></h3>
                                    <!-- Price Section -->
                                    <p class="product-card__price">
                                    <span class="product-card__price-regular"><?= $product['price'] ?></span>
                                    </p>
                                </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a href="?page=bags" class="home__see-all-btn">Xem tất cả</a>
            </div>

            <!-- Giày Nam -->
            <div id="shoes-for-men" class="category-border d-flex d-flex-column align-center">
                <h3 class="category-title">Giày Nam</h3>
                <div class="category-list">
                    <?php foreach ($regularProducts as $product): ?>
                        <?php if ($product['category'] == 'shoesForMen'): ?>
                            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                                <div class="product-card__image-wrapper">
                                    <a href="/views/detail/<?= $product['type'] ?>-detail.html?id=<?= $product['id'] ?>&category=<?= $product['category'] ?>">
                                    <img src="../public/img/regular/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-card__image" />
                                    </a>
                                    <!-- Color Options -->
                                    <?php if (!empty($product['colors']) && is_array($product['colors'])): ?>
                                    <div class="product-card__color-options">
                                    <?php foreach ($product['colors'] as $color): ?>
                                    <span class="product-card__color" data-color="<?= $color ?>" style="background-color: <?= $color ?>" aria-describedby="<?= $color ?>"> </span>
                                    <?php endforeach; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="product-card__color-options">
                                    <span class="product-card__no-color">Không có màu sắc</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-card__info">
                                    <h3 class="product-card__title"><?= $product['name'] ?></h3>
                                    <!-- Price Section -->
                                    <p class="product-card__price">
                                    <span class="product-card__price-regular"><?= $product['price'] ?></span>
                                    </p>
                                </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a href="?page=shoesForMen" class="home__see-all-btn">Xem tất cả</a>
            </div>

            <!-- Dép Và Sandal -->
            <div id="dep-sandal" class="category-border d-flex d-flex-column align-center">
                <h3 class="category-title">Dép Và Sandal</h3>
                <div class="category-list">
                    <?php foreach ($regularProducts as $product): ?>
                        <?php if ($product['category'] == 'depSandal'): ?>
                            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                                <div class="product-card__image-wrapper">
                                    <a href="/views/detail/<?= $product['type'] ?>-detail.html?id=<?= $product['id'] ?>&category=<?= $product['category'] ?>">
                                    <img src="../public/img/regular/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-card__image" />
                                    </a>
                                    <!-- Color Options -->
                                    <?php if (!empty($product['colors']) && is_array($product['colors'])): ?>
                                    <div class="product-card__color-options">
                                    <?php foreach ($product['colors'] as $color): ?>
                                    <span class="product-card__color" data-color="<?= $color ?>" style="background-color: <?= $color ?>" aria-describedby="<?= $color ?>"> </span>
                                    <?php endforeach; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="product-card__color-options">
                                    <span class="product-card__no-color">Không có màu sắc</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-card__info">
                                    <h3 class="product-card__title"><?= $product['name'] ?></h3>
                                    <!-- Price Section -->
                                    <p class="product-card__price">
                                    <span class="product-card__price-regular"><?= $product['price'] ?></span>
                                    </p>
                                </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a href="?page=depSandal" class="home__see-all-btn">Xem tất cả</a>
            </div>
        </div>
    </section>
</div>
