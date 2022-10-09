<?php

use Bitrix\Main\Diag\Debug;

const DEFAULT_TEMPLATE_PATH = '/local/templates/.default';
const MAIN_TEMPLATE_PATH = '/local/templates/main';

function debug($data)
{
    Debug::dump($data);
}
