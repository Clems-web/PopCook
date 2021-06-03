<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

session_start();

if (isset($_POST['username'], $_POST['user-pass'], $_POST['user-mail'])) {

    if (($_POST['username'] !== 'User deleted')
        && ($_POST['user-pass'] !== 'password deleted')
        && ($_POST['user-mail'] !== 'mail deleted')) {

            $user = new User(
                null,
                $_POST['username'],
                $_POST['user-pass'],
                $_POST['user-mail'],
                2
            );

            (new UserManager())->saveUser($user);
            $_SESSION['user'] = $user;

    }

    header('Location: http://localhost:8000/index.php');
}
