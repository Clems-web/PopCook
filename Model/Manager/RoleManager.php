<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';

class RoleManager {

    // Get all role
    public function getRoleList() {
        $role = [];

        $request = DB::getInstance()->prepare(" SELECT * FROM role ");
        $request->execute();

        if ($request) {
            $data = $request->fetchAll();
            foreach ($data as $data_role) {
                $role[] = new Role($data_role['id'], $data_role['title']);
            }
        }
        return $role;
    }

    // If role's Id is null or equal to 0, that's an insert into DB
    public function saveRole(Role $role) {

        if ($role->getId() === 0 || $role->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO role(title) VALUES (:title)
        ");
            $request->bindValue(':title', $role->getTitle());
            $request->execute();

            if ($request) {
                echo "Role saved in DB";
            }
        }

        // Else it's an update of the role
        else {
            $request = DB::getInstance()->prepare("
            UPDATE role SET title = :title WHERE id = :id
            ");

            $request->bindValue(":title", $role->getTitle());
            $request->bindValue(':id', $role->getId());

            $request->execute();

            if ($request) {
                echo "Role Updated";
            }
        }
    }

    // Deleted Role
    public function delRole(Role $role) {
        $request = DB::getInstance()->prepare("
        DELETE FROM role WHERE id = :id;
        ");
        $request->bindValue('id', $role->getId());

        $result = $request->execute();
        if ($result) {
            echo "Role supprimé";
        }
    }




}