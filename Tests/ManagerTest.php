<?php

use PHPUnit\Framework\TestCase;
require dirname(__FILE__) . "/../Model/DB.php";
require dirname(__FILE__) . "/../Model/Entity/User.php";
require dirname(__FILE__) . "/../Model/Manager/UserManager.php";

class ManagerTest extends TestCase {

    public function testSaveUser() {

        $user = new User(null, 'InsertTest', 'passwordTest', 'insert@gmail.com', 2);

        $manager = new UserManager();

        $this->assertIsString($manager->saveUser($user));

    }
}
