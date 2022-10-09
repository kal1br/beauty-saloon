<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

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
        $arParams['IBLOCK_ID'] = (int)$arParams['IBLOCK_ID'] ?? 1;

        return $arParams;
    }

    /**
     * @throws LoaderException
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function executeComponent()
    {
        $this->checkModules();
        $this->getServicesList();
        $this->includeComponentTemplate();
    }

    /**
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ArgumentException
     */
    public function getServicesList()
    {
        $result = [];

        $elements = \Bitrix\Iblock\SectionTable::getList([
            'filter' => ['IBLOCK_ID' => $this->arParams['IBLOCK_ID']],
            'select' => ['NAME', 'PICTURE'],
        ])->fetchCollection();

        foreach ($elements as $element) {
            $result[] = [
                'name' => $element->getName(),
                'img' => CFile::GetPath($element->getPicture())
            ];
        }

        $this->arResult = array_merge($this->arResult, $result);
    }

    /**
     * Проверка наличия модулей для работы компонента
     * @return void
     * @throws LoaderException
     * @throws \Exception
     */
    private function checkModules(): void
    {
        if (!Loader::includeModule('iblock')) {
            throw new Exception(Loc::getMessage('DEV_SERVICES_LIST_CLASS_ERROR'));
        }

    }
}
