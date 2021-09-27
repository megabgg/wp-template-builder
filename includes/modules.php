<?php

$modules = __DIR__ . '/modules/';

foreach (scandir($modules) as $module) {
    $exceptions = ['.', '..'];
    if (!in_array($module, $exceptions) && is_dir($modules . $module) && file_exists($modules . $module . '/index.php')) {
        require_once($modules . $module . '/index.php');
    }
}

