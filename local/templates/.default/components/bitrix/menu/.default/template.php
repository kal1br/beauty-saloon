<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arResult */
?>

<nav class="nav">
    <ul class="nav-list">
        <?php foreach ($arResult as $item):?>
            <li class="nav-item">
                <a href="<?=$item['LINK']?>" class="nav-link <?=!$item['SELECTED'] ?: 'active'?>">
                    <?=$item['TEXT']?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
