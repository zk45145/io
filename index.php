<?php
include_once('autoload.php');
$application = new General_Application();
$application->printHeader()->printHeaderText('naglowek')->printMenu();
$form = new General_Form();
echo $form->header('naglowek strony');
$application->printFooter();