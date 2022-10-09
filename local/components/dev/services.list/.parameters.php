<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

if (!Loader::includeModule('iblock')) {
    throw new \Exception('Не загружены модули необходимые для работы компонента');
}

$arIBlock = [];

$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], ['ACTIVE' => 'Y']);

while ($arr = $rsIBlock->Fetch()) {
    $arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}

$arComponentParameters = [
    'GROUPS' => [
        'SETTINGS' => [
            'NAME' => Loc::getMessage('DEV_SERVICES_LIST_PARAMS_PROP_SETTINGS'),
            'SORT' => 550,
        ],
    ],
    'PARAMETERS' => [
        'IBLOCK_ID' => [
            'PARENT' => 'SETTINGS',
            'NAME' => Loc::getMessage('DEV_SERVICES_LIST_PARAMS_PROP_IBLOCK_ID'),
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES' => $arIBlock,
            'REFRESH' => 'Y'
        ],
        'CACHE_TIME' => ['DEFAULT' => 3600],
    ]
];
