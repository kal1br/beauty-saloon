<?php

use Bitrix\Main\HttpApplication;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Dev\Services\Helper\OptionsHelper;

Loc::loadMessages(__FILE__);

global $APPLICATION;

$module_id = 'dev.services';

Loader::includeModule($module_id);

$request = HttpApplication::getInstance()->getContext()->getRequest();

$arIBlocks = OptionsHelper::getIblockList();

$aTabs = [
    [
        'DIV' => 'edit1',
        'TAB' => Loc::getMessage('DEV_SERVICES_OPTIONS_TAB'),
        'TITLE' => Loc::getMessage('DEV_SERVICES_OPTIONS_TITLE'),
        'OPTIONS' => [
            Loc::getMessage('DEV_SERVICES_OPTIONS_TAB1_TITLE'),
            [
                'tab1_services_iblock_id',
                Loc::getMessage('DEV_SERVICES_OPTIONS_TAB1_IBLOCK_ID'),
                array_key_first($arIBlocks),
                ['selectbox', $arIBlocks],
            ]
        ]
    ]
];

$tabControl = new CAdminTabControl('tabControl', $aTabs);
$tabControl->Begin();
?>
<form name="dev_services_options" method="POST" action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($request['mid']) ?>&amp;lang=<?= LANG ?>">
    <?php
    foreach ($aTabs as $aTab) {
        if ($aTab['OPTIONS']) {
            $tabControl->BeginNextTab();

            __AdmSettingsDrawList($module_id, $aTab['OPTIONS']);
        }
    }
    $tabControl->Buttons();
    ?>
    <input type="submit" name="Update" value="<?=GetMessage('MAIN_SAVE')?>" />
    <input type="reset" name="reset" value="<?=GetMessage('MAIN_RESET')?>" />
    <?=bitrix_sessid_post()?>
</form>
<?php
$tabControl->End();
