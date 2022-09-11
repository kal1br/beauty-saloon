<?php
const NO_KEEP_STATISTIC = true;
const NO_AGENT_STATISTIC = true;
const NOT_CHECK_PERMISSIONS = true;

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$response = new \Bitrix\Main\HttpResponse();

try {
    $response->addHeader('Content-Type', 'application/json');

    $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $request->addFilter(new Bitrix\Main\Web\PostDecodeFilter);

    $id = $request->get('id');

    CBitrixComponent::includeComponentClass("dev:examples");
    $component = new ExamplesComponent();

    $arResult = [
        'status' => 'success',
        'examples' => $component->getExamplesBySectionId((int)$id),
        'id' => $id
    ];
} catch (\Bitrix\Main\ArgumentNullException | \Bitrix\Main\LoaderException $e) {
    $arResult = [
        'status' => 'error',
        'message' => 'error'
    ];
}

$response->flush(Bitrix\Main\Web\Json::encode($arResult));
