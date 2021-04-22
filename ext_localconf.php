<?php
defined('TYPO3_MODE') || die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['createHashBase'][]
    = \Pixelant\CacheHash\Hook\CreateHashBaseHook::class . '->createHashBase';
