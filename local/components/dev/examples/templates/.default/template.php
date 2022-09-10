<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arResult */
?>
<section class="examples-section">
    <div class="container">
        <h2 class="examples-section-title">Наши работы</h2>

        <ul class="examples-header-list">
            <li class="examples-header-item"><button class="examples-header-link active" value="0">Показать все</button></li>

            <?php foreach ($arResult['sections'] as $section): ?>
                <li class="examples-header-item">
                    <button class="examples-header-link" value="<?= $section['id'] ?>"><?= $section['name'] ?></button>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="examples-list" id="examples-list">
            <?php foreach ($arResult['examples'] as $item): ?>
                <div class="examples-item">
                    <img class="examples-img" src="<?= $item['img'] ?>" alt="example">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="loader-block" style="display: none">
            <div class="lds-dual-ring"></div>
        </div>
    </div>
</section>