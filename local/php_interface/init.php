<?php

const MAIN_TEMPLATE_PATH = '/local/templates/main';

function debug($data)
{
    \Bitrix\Main\Diag\Debug::dump($data);
}
