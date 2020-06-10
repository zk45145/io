<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('Strona Główna')->printMenu();
$application->printFooter();