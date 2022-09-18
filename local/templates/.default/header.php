<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @global \CMain $APPLICATION */

use Bitrix\Main\Page\Asset;
?>
<!doctype html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?php $APPLICATION->ShowHead(); ?>

    <?php
        Asset::getInstance()->addJs(DEFAULT_TEMPLATE_PATH . '/js/script.js');

        Asset::getInstance()->addString('<meta charset="UTF-8">');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">');
        Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="ie=edge">');
    ?>

    <title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body>

    <div id="admin-panel">
        <?php $APPLICATION->ShowPanel(); ?>
    </div>

    <div class="wrapper">
        <div class="content">
            <header class="header" id="header">
                <div class="container">
                    <div class="header-inner">
                        <?php
                        $APPLICATION->IncludeComponent(
                            'bitrix:menu',
                            '',
                            [
                                'ALLOW_MULTI_SELECT' => 'N',
                                'CHILD_MENU_TYPE' => 'left',
                                'DELAY' => 'N',
                                'MAX_LEVEL' => '1',
                                'MENU_CACHE_GET_VARS' => [''],
                                'MENU_CACHE_TIME' => '3600',
                                'MENU_CACHE_TYPE' => 'N',
                                'MENU_CACHE_USE_GROUPS' => 'Y',
                                'ROOT_MENU_TYPE' => 'main',
                                'USE_EXT' => 'N'
                            ]
                        );
                        ?>
                    </div>
                </div>
            </header>

            <main> <!-- start main -->