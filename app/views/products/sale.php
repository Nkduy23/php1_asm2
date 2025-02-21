<!-- Flash Sale Section -->
<section class="home__flash-sale d-flex d-flex-column align-center" aria-label="Flash Sale">
    <div id="flash-sale-products" class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-card" data-type="<?= $product['type'] ?>" aria-label="Product Card">
                <div class="product-card__image-wrapper">
                    <a href="/views/detail/<?= $product['type'] ?>-detail.html?id=<?= $product['id'] ?>&category=<?= $product['category'] ?>">
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
</section>