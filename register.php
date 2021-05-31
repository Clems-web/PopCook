<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';



if (isset($_POST['username'], $_POST['user-pass'], $_POST['user-mail'])) {

    $user = new User(
        null,
        $_POST['username'],
        $_POST['user-pass'],
        $_POST['user-mail'],
        2
    );
    (new UserManager())->saveUser($user);

    header('Location: index.php');
}
