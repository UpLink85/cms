<?php


if (!empty($_POST['loginUsername'])){
    include __DIR__ . '/Main/home.html';
}else{
    include __DIR__.'/Login/login.html';
}


?>