<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

if( !Loader::includeModule('iblock') ) {
    throw new Exception('Не загружены модули необходимые для работы компонента');
}

$arIBlock = [];

$rsIBlock = \Bitrix\Iblock\IblockTable::getList([
    'filter' => ['=ACTIVE' => 'Y']
]);

while ($arr = $rsIBlock->fetch()) {
    $arIBlock[$arr['CODE']] = '['.$arr['CODE'].'] '.$arr['NAME'];
}

$arComponentParameters = [
    'GROUPS' => [
        'SETTINGS' => [
            'NAME' => Loc::getMessage('DEV_EXAMPLES_PARAMS_PROP_SETTINGS'),
            'SORT' => 550,
        ],
    ],
    'PARAMETERS' => [
        'IBLOCK_CODE' => [
            'PARENT' => 'SETTINGS',
            'NAME' => Loc::getMessage('DEV_EXAMPLES_PARAMS_PROP_IBLOCK_CODE'),
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES' => $arIBlock,
            'REFRESH' => 'Y'
        ],
        'CACHE_TIME' => ['DEFAULT' => 3600],
    ]
];
