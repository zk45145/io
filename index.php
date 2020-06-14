<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('Strona Główna')->printMenu();
print ('<h3>Panel administratora.</h3>');
$application->printFooter();