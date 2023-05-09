<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$aMenu[] = [
    'parent_menu' => 'global_menu_services',
    'sort' => 1,
    'title' => Loc::getMessage('DEV_SERVICES_MENU_TITLE'),
    'text' => Loc::getMessage('DEV_SERVICES_MENU_TEXT'),
    'items_id' => 'dev_services',
    'icon' => 'util_menu_icon',
    'page_icon' => 'util_page_icon',
    'items' => [
        [
            'text' => Loc::getMessage('DEV_SERVICES_MENU_MIGRATION'),
            'url' => '/bitrix/admin/dev_services_migration.php'
        ]
    ]
];

return $aMenu;