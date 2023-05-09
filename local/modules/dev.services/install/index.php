<?php

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class dev_services extends CModule
{
    public function __construct()
    {
        $arModuleVersion = array();
        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_ID = 'dev.services';
        $this->MODULE_NAME = Loc::getMessage('DEV_SERVICES_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('DEV_SERVICES_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('DEV_SERVICES_PARTNER_NAME');
        $this->PARTNER_URI = 'https://example.com';
    }

    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->installDB();
        $this->installFiles();
    }

    public function doUninstall()
    {
        $this->uninstallDB();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function installFiles()
    {
        if (\Bitrix\Main\IO\Directory::isDirectoryExists($this->getPath() . '/admin')) {
            CopyDirFiles($this->getPath().'/install/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin');
        }
    }

    public function unInstallFiles()
    {
        if (\Bitrix\Main\IO\Directory::isDirectoryExists($this->getPath() . '/admin')) {
            DeleteDirFiles($this->getPath().'/install/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin');
        }
    }

    public function getPath($notDocumentRoot = false)
    {
        if ($notDocumentRoot) {
            return str_ireplace(Application::getDocumentRoot(),'',dirname(__DIR__));
        } else {
            return dirname(__DIR__);
        }
    }
}