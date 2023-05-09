<?php

namespace Dev\Services\Helper;

use Bitrix\Main\Loader;
use Exception;

class OptionsHelper
{
    /**
     * @throws Exception
     */
    public static function getIblockList(): array
    {
        if (!Loader::includeModule('iblock')) {
            return [];
        }

        $arIBlocks = [];

        $rsIBlock = \Bitrix\Iblock\IblockTable::getList([
            'order' => ['SORT' => 'ASC'],
            'filter' => ['=ACTIVE' => 'Y']
        ]);

        while($arIBlock = $rsIBlock->fetch()) {
            $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];
        }

        return $arIBlocks;
    }
}