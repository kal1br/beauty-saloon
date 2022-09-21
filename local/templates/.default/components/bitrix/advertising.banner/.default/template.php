<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arResult */

$frame = $this->createFrame()->begin('');
?>

<section class="banner-section container">
        <?= $arResult['BANNER'] ?>
</section>

<?php
$frame->end();
