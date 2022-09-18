<?php

use Bitrix\Main\Diag\Debug;

const DEFAULT_TEMPLATE_PATH = '/local/templates/.default';

function debug($data)
{
    Debug::dump($data);
}
