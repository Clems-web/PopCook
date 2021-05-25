<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
session_start();


if (isset($_SESSION['user'], $_POST['new-username'], $_POST['old-user-mail'], $_POST['new-user-mail'], $_POST['old-user-pass'], $_POST['new-user-pass'])) {

    if (($_POST['old-user-mail'] === $_SESSION['user']->getMail()) && ($_POST['old-user-pass'] === $_SESSION['user']->getPassword())) {

        $user = new User($_SESSION['user']->getId(), $_POST['new-username'], $_POST['new-user-pass'], $_POST['new-user-mail'], $_SESSION['user']->getRole());
        $manager = new UserManager();
        $userConnected = $manager->saveUser($user);

        $_SESSION['user'] = $user;

        header('Location: http://localhost:8000/?controller=profile');
    }
    else {
        header('Location: http://localhost:8000/?controller=updateUser');
    }
}
