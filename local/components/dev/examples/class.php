<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

class ExamplesComponent extends CBitrixComponent
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
        $this->arResult['sections'] = $this->getSections();
        $this->arResult['examples'] = $this->getExamplesArray();

        if ($this->arResult['examples']) {
            $this->includeComponentTemplate();
        }
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getSections(): array
    {
        $result = [];

        $rsSections = \Bitrix\Iblock\SectionTable::getList([
            'filter' => [
                '=IBLOCK.CODE' => $this->arParams['IBLOCK_CODE'],
                '=ACTIVE' => 'Y'
            ],
            'select' => ['ID', 'NAME']
        ]);

        while ($arSection = $rsSections->fetch()) {
            $result[] = [
                'id' => $arSection['ID'],
                'name' => $arSection['NAME']
            ];
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    public function getExamplesBySectionId($id): array
    {
        $this->checkModules();

        $result = [];

        $filter['=IBLOCK.CODE'] = 'services';
        if ($id) {
            $filter['=IBLOCK_SECTION_ID'] = $id;
        }

        $rsElements = \Bitrix\Iblock\ElementTable::getList([
            'order' => ['DATE_CREATE' => 'ASC'],
            'filter' => $filter,
            'limit' => 9,
            'select' => ['PREVIEW_PICTURE', 'IBLOCK_SECTION_ID']
        ]);

        while ($arElement = $rsElements->fetch()) {
            $result[] = [
                'img' => CFile::GetPath($arElement['PREVIEW_PICTURE'])
            ];
        }

        return $result;
    }

    public function getExamplesArray(): array
    {
        $result = [];

        $rsElements = \Bitrix\Iblock\ElementTable::getList([
            'order' => ['DATE_CREATE' => 'ASC'],
            'filter' => [
                '=IBLOCK.CODE' => $this->arParams['IBLOCK_CODE'],
                '=ACTIVE' => 'Y'
            ],
            'limit' => 9,
            'select' => ['PREVIEW_PICTURE']
        ]);

        while ($arElement = $rsElements->fetch()) {
            $result[] = [
                'img' => CFile::GetPath($arElement['PREVIEW_PICTURE'])
            ];
        }

        return $result;
    }

    /**
     * Проверка наличия модулей для работы компонента
     * @return void
     * @throws Exception
     */
    private function checkModules(): void
    {
        if (!Loader::includeModule('iblock')) {
            throw new Exception(Loc::getMessage('DEV_EXAMPLES_CLASS_ERROR'));
        }

    }
}
