<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

/** @global \CMain $APPLICATION */
$APPLICATION->SetTitle('Мастера');
?>

<section class="masters-section">
    <div class="container">
        <h1>Мастера</h1>

        <div>
            <a href="/masters/detail.php">Мастер 1</a>
        </div>
    </div>
</section>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');?>