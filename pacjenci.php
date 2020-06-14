<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('Pacjenci')->printMenu();
$view = new View_Pacjenci();
echo $view->getContent();
$application->printFooter();