<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

if (isset($_POST['user-mail']) && isset($_POST['user-pass']))  {

    $manager = new UserManager();
    $db = new DB();

    if (($_POST['user-mail'] !== 'mail deleted') && ($_POST['user-pass'] !== 'password deleted')) {

        $pass = $db->cleanInput($_POST['user-pass']);
        $mail = $db->cleanInput($_POST['user-mail']);

        $userConnected = $manager->connectUser($mail, $pass);
        if ($userConnected !== false) {
            $_SESSION['user'] = $userConnected;
        }
    }
}

header('Location: http://localhost:8000/index.php');
