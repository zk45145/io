<?php

function __autoload($className)
{
    $classPath = explode('_', $className);
    if (count($classPath)) {
        switch ($classPath[0]) {
            case 'General':
                include_once('./lib/general/' . $classPath[1] . '.class.php');
                break;
            case 'Model':
                include_once('./lib/model/' . $classPath[1] . '.class.php');
                break;
            case 'Mapper':
                include_once('./lib/mapper/' . $classPath[1] . '.class.php');
                break;
            case 'Abstract':
                include_once('./lib/abstract/' . $classPath[1] . '.class.php');
                break;
            case 'View':
                include_once('./lib/view/' . $classPath[1] . '.class.php');
                break;
            default:
                throw new Exception('Nie obsłuzony przypadek ladowania pliku klasy ' . $className);
                break;
        }
    } else {
        include_once('./lib/' . $classPath[0] . '.class.php');
    }

}