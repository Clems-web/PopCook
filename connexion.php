<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';



if (isset($_POST['username'], $_POST['user-pass'])) {
    $manager = new UserManager();
    $userConnected = $manager->connectUser($_POST['username'], $_POST['user-pass']);

    $_SESSION['user'] = $userConnected;

    header('Location: index.php');
}
