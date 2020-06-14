<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('Lekarze')->printMenu();
$view = new View_Lekarze();
echo $view->getContent();
$application->printFooter();