<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

class ServicesListComponent extends CBitrixComponent
{
    /**
     * Подготовка параметров компонента
     * @param $arParams
     * @return mixed
     */
    public function onPrepareComponentParams($arParams) {

        $arParams['CACHE_TIME'] = (int)$arParams['CACHE_TIME'] ?? 3600;
        $arParams['CACHE_TYPE'] = $arParams['CACHE_TYPE'] ?? 'A';
        $arParams['IBLOCK_CODE'] = $arParams['IBLOCK_CODE'] ?? 'services';

        return $arParams;
    }

    /**
     * @throws Exception
     */
    public function executeComponent()
    {
        $this->checkModules();
        $this->getServicesList();
        $this->includeComponentTemplate();
    }

    /**
     * Получить список услуг
     * @throws Exception
     */
    public function getServicesList()
    {
        $result = [];

        $rsSections = SectionTable::getList([
            'filter' => [
                '=IBLOCK.CODE' => $this->arParams['IBLOCK_CODE'],
                '=ACTIVE' => 'Y'
            ],
            'select' => ['NAME', 'PICTURE'],
        ]);

        while ($arSection = $rsSections->fetch()) {
            $result[] = [
                'name' => $arSection['NAME'],
                'img' => CFile::GetPath($arSection['PICTURE'])
            ];
        }

        $this->arResult = array_merge($this->arResult, $result);
    }

    /**
     * Проверка наличия модулей для работы компонента
     * @return void
     * @throws Exception
     */
    private function checkModules(): void
    {
        if (!Loader::includeModule('iblock')) {
            throw new Exception(Loc::getMessage('DEV_SERVICES_LIST_CLASS_ERROR'));
        }
    }
}
