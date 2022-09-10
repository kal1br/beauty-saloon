<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

/** @global \CMain $APPLICATION */

CHTTP::SetStatus('404 Not Found');
@define('ERROR_404', 'Y');

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle('404 Not Found');
?>

<section class="not-found-section">
    <h1 style="text-align: center">Страница не найдена</h1>
</section>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>
