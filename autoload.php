<?php

function __autoload($className)
{
    $classPath = explode('_', $className);
    switch ($classPath[0]) {
        case 'General':
            include_once('./lib/general/' . $classPath[1] . '.class.php');
            break;
        default:
            include_once('./lib/' . $classPath[1] . '.class.php');
            break;
    }
}