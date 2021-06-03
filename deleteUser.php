<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';
session_start();

$db = new DB();

if (isset($_SESSION['user'], $_POST['userName'], $_POST['userPass'])) {

    if (($db->cleanInput($_POST['userName']) === $_SESSION['user']->getUsername()) &&
        ($db->cleanInput($_POST['userPass']) === $_SESSION['user']->getPassword())) {

        $user = new User(
            $_SESSION['user']->getId(),
            'User deleted',
            'password deleted',
            'mail deleted',
            3
        );

        (new UserManager())->saveUser($user);

        session_start();
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'],$params['HttpOnly']);
        session_destroy();

        header('Location: http://localhost:8000/index.php');
    }
}
