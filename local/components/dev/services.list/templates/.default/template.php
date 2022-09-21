<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arResult */
?>

<section class="services-section">
    <div class="container">
        <div class="services-description">
            <img src="/local/templates/.default/images/services/apostrophe.png" alt="apostrophe">
            <p class="services-description-content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In arcu nibh vitae amet. Ipsum, pharetra donec ornare velit. Id at quisque accumsan risus ac ipsum ut. Sit elit, facilisi proin non malesuada sociis tristique. Viverra augue lorem ut quisque quam tortor, malesuada iaculis.
                Et elementum at nulla venenatis, faucibus integer. Auctor neque eros, viverra rutrum. Fames ultrices condimentum tortor nec penatibus. Velit imperdiet sapien fringilla vestibulum sit fames.
            </p>
        </div>
        <div class="services-list">
            <?php foreach ($arResult as $service): ?>
                <div class="services-item">
                    <div class="services-img-block">
                        <img class="services-img" src="<?= $service['img'] ?>" alt="<?= $service['name'] ?>">
                    </div>
                    <p class="services-item-title"><?= $service['name'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>