<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arResult */
?>
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
