<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

class ServicesListComponent extends \CBitrixComponent
{
    /**
     * Подготовка параметров компонента
     * @param $arParams
     * @return mixed
     */
    public function onPrepareComponentParams($arParams) {

        $arParams['CACHE_TIME'] = (int)$arParams['CACHE_TIME'] ?? 3600;
        $arParams['CACHE_TYPE'] = $arParams['CACHE_TYPE'] ?? 'A';
        $arParams['IBLOCK_ID'] = (int)$arParams['IBLOCK_ID'] ?? 3;

        return $arParams;
    }

    /**
     * @throws \Bitrix\Main\LoaderException
     */
    public function executeComponent()
    {
        $this->checkModules();
        $this->arResult = array_merge($this->arResult, $this->getServicesListArray());
        $this->includeComponentTemplate();
    }

    public function getServicesListArray(): array
    {
        $result = [];

        $res = CIBlockElement::GetList(
            ['created ' => 'ASC'],
            ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
            false,
            ['nPageSize' => 6],
            ['NAME', 'PREVIEW_PICTURE']
        );

        while ($item = $res->fetch()) {
            $result[] = [
                'name' => $item['NAME'],
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
            throw new \Exception(Loc::getMessage('DEV_SERVICES_LIST_CLASS_ERROR'));
        }

    }
}
