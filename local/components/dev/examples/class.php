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
        $arParams['IBLOCK_ID'] = (int)$arParams['IBLOCK_ID'] ?? 4;

        return $arParams;
    }

    /**
     * @throws \Bitrix\Main\LoaderException
     */
    public function executeComponent()
    {
        $this->checkModules();
        $this->arResult['sections'] = $this->getSections();
        $this->arResult['examples'] = $this->getExamplesArray();
        $this->includeComponentTemplate();
    }

    public function getSections(): array
    {
        $result = [];

        $res = CIBlockSection::GetList(
            ['SORT' => 'ASC'],
            ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
            true,
            ['*'],
        );

        while ($item = $res->fetch()) {
            $result[] = [
                'id' => $item['ID'],
                'name' => $item['NAME']
            ];
        }

        return $result;
    }

    /**
     * @throws \Bitrix\Main\LoaderException
     */
    public function getExamplesBySectionId($id): array
    {
        $this->checkModules();

        $result = [];

        $filter['IBLOCK_ID'] = $this->arParams['IBLOCK_ID'];

        if ($id) {
            $filter['SECTION_ID'] = $id;
        }

        $res = CIBlockElement::GetList(
            ['created ' => 'ASC'],
            $filter,
            false,
            ['nPageSize' => 9],
            ['PREVIEW_PICTURE']
        );

        while ($item = $res->fetch()) {
            $result[] = [
                'img' => CFile::GetPath($item['PREVIEW_PICTURE'])
            ];
        }

        return $result;
    }

    public function getExamplesArray(): array
    {
        $result = [];

        $res = CIBlockElement::GetList(
            ['created ' => 'ASC'],
            ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
            false,
            ['nPageSize' => 9],
            ['PREVIEW_PICTURE']
        );

        while ($item = $res->fetch()) {
            $result[] = [
                'img' => CFile::GetPath($item['PREVIEW_PICTURE'])
            ];
        }

        return $result;
    }

    /**
     * Проверка наличия модулей для работы компонента
     * @return void
     * @throws \Bitrix\Main\LoaderException
     * @throws \Exception
     */
    private function checkModules(): void
    {
        if (!Loader::includeModule('iblock')) {
            throw new Exception(Loc::getMessage('DEV_EXAMPLES_CLASS_ERROR'));
        }

    }
}
