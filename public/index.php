<?php

include __DIR__ . '/model/DBAccess.php';

session_start();

$siteAction = '';

$siteAction = (isset($_GET['siteAction'])) ? $_GET['siteAction'] : '';

//var_dump($_SESSION);

$model = new DBAccess();

include __DIR__.'/Layout/Header/header.html';
include __DIR__ . '/Layout/Menu/menu.php';
include __DIR__ . '/Layout/Sidebar/sidebar.php';

switch ($siteAction) {
    case 'login':
        include __DIR__ . '/Login/login.html';
        break;
    case 'um':
        include __DIR__ . '/UserManagment/userManagment.php';
        break;
    default:
}

include __DIR__ . '/Layout/Footer/footer.html';

?>