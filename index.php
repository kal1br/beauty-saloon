<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

/** @global \CMain $APPLICATION */

$APPLICATION->SetTitle('Салон красоты');
?>

<section class="main-section">
    <div class="container">
        <div class="main-section-header">
            <h1 class="main-section-title">Салон красоты</h1>
        </div>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    'dev:services.list',
    '',
    [
        'CACHE_TIME' => '3600',
        'CACHE_TYPE' => 'A',
        'IBLOCK_ID' => '3',
    ]
);
?>

<section class="partners-section">
    <div class="container">
        <div class="partners-list">
            <div class="partners-item">
                <img src="/local/templates/.default/images/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/.default/images/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/.default/images/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/.default/images/partners/kevin.png" alt="kevin murphy">
            </div>
        </div>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    'dev:examples',
    '',
    [
        'CACHE_TIME' => '3600',
        'CACHE_TYPE' => 'A',
        'IBLOCK_ID' => '4',
    ]
);
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>