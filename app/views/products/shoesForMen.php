<section class="home__regular-products" aria-label="Regular Products">
        <div id="regular-products" class="product-list">
            <!-- Giày Cao Gót Nữ -->
            <div id="shoes-for-women" class="category-border d-flex d-flex-column align-center">
                <h3 class="category-title">Giày Nam</h3>
                <div class="category-list">
                    <?php foreach ($products as $product): ?>
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
            </div>

</section>
