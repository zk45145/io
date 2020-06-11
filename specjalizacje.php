<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('Specjalizacje')->printMenu();
$view = new View_Specjalizacje();
echo $view->getContent();
$application->printFooter();