<?php

include __DIR__ . '/model/DBAccess.php';

session_start();

$siteAction = '';

$siteAction = (isset($_GET['siteAction'])) ? $_GET['siteAction'] : '';

var_dump($_SESSION);

$model = new DBAccess();

switch ($siteAction) {
    case 'login':
        include __DIR__ . '/Login/login.html';
        break;
    default:
        include __DIR__ . '/Main/home.html';
        break;
}


?>