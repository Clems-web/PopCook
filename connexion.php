<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

$db = new DB();

if (isset($_POST['username']) && isset($_POST['user-pass']))  {

    if (($_POST['username'] !== 'User deleted') && ($_POST['user-pass'] !== 'password deleted')) {

        $manager = new UserManager();
        $userConnected = $manager->connectUser($db->cleanInput($_POST['username']), $db->cleanInput($_POST['user-pass']));

        $_SESSION['user'] = $userConnected;
    }

    header('Location: http://localhost:8000/index.php');
}
