<?php
require_once("config.php");
$logData = [
    'username' => USER_USERNAME,
    'process' => "logout",
    'type' => 0,
    'href' => BASE_URL."logout",
    'date' => $oxcakmak->latestDateHM(),
    'address' => $oxcakmak->getIPAddress()
];
if($dbh->insert("log", $logData)){
    unset($_SESSION['session']);
    unset($_SESSION['user']);
    unset($_SESSION['latestProfile']);
    $oxcakmak->redirect(BASE_URL);
    exit;
}
?>