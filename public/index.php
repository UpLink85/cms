<?php

session_start();


$siteAction = (isset($_GET['siteAction'])) ? $_GET['siteAction'] : '';


include __DIR__.'/Layout/Header/header.html';
include __DIR__ . '/Layout/Menu/menu.php';
include __DIR__ . '/Layout/Sidebar/sidebar.php';

switch ($siteAction) {
    case 'login':
        include __DIR__ . '/Login/login.html';
        break;
    case 'um':
        include __DIR__ . '/UserManagement/userManagement.php';
        break;
    default:
}

include __DIR__ . '/Layout/Footer/footer.html';

?>