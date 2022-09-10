<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    'NAME' => Loc::getMessage('DEV_SERVICES_LIST_DESCRIPTION_NAME'),
    'DESCRIPTION' => Loc::getMessage('DEV_SERVICES_LIST_DESCRIPTION_DESCRIPTION'),
    'COMPLEX' => 'N',
    'SORT' => 10,
    'PATH' => [
        'ID' => 'local',
        'NAME' => Loc::getMessage('DEV_SERVICES_LIST_DESCRIPTION_PATH_NAME'),
    ]
];
