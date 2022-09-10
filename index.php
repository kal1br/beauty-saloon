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

<section class="services-section">
    <div class="container">
        <div class="services-description">
            <img src="/local/templates/main/img/services/apostrophe.png" alt="apostrophe">
            <p class="services-description-content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In arcu nibh vitae amet. Ipsum, pharetra donec ornare velit. Id at quisque accumsan risus ac ipsum ut. Sit elit, facilisi proin non malesuada sociis tristique. Viverra augue lorem ut quisque quam tortor, malesuada iaculis.
                Et elementum at nulla venenatis, faucibus integer. Auctor neque eros, viverra rutrum. Fames ultrices condimentum tortor nec penatibus. Velit imperdiet sapien fringilla vestibulum sit fames.
            </p>
        </div>
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
    </div>
</section>

<section class="partners-section">
    <div class="container">
        <div class="partners-list">
            <div class="partners-item">
                <img src="/local/templates/main/img/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/main/img/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/main/img/partners/kevin.png" alt="kevin murphy">
            </div>

            <div class="partners-item">
                <img src="/local/templates/main/img/partners/kevin.png" alt="kevin murphy">
            </div>
        </div>
    </div>
</section>

<section class="examples-section">
    <div class="container">
        <h2 class="examples-section-title">Наши работы</h2>

        <ul class="examples-header-list">
            <li class="examples-header-item"><a class="examples-header-link" href="#">Показать все</a></li>
            <li class="examples-header-item"><a class="examples-header-link" href="#">Парикмахерские услуги</a></li>
            <li class="examples-header-item"><a class="examples-header-link" href="#">Маникюр</a></li>
            <li class="examples-header-item"><a class="examples-header-link" href="#">Педикюр</a></li>
        </ul>

        <div class="examples-list">
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
            <div class="examples-item">
                <img class="examples-img" src="/local/templates/main/img/examples/work-9.png" alt="example">
            </div>
        </div>
    </div>
</section>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>