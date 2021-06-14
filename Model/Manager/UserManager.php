<?php

class UserManager {

    // Get all User
    public function getUser() {
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $user_data) {
                $user[] = new User($user_data['id'], $user_data['name'], $user_data['password'], $user_data['mail'] ,$user_data['role_fk']);
            }
        }
        return $user;
    }

    public function getUserPass($mail) {
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);

        $result = $request->execute();
        if ($result) {
            $data = $request->fetch();
            if ($data) {
                $user = new User($data['id'], $data['username'], $data['password'], $data['mail'], $data['role_fk']);
            }
        }
        return $user;
    }

    // User connect
    public function connectUser(string $mail, string $password){

        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);

        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                if (password_verify($password, $user_data['password'])) {
                    $user = new User(
                        $user_data['id'],
                        $user_data['username'],
                        $password,
                        $user_data['mail'],
                        $user_data['role_fk']
                    );
                    return $user;
                }
            }
        }
        return false;
    }

    // Get User by Id
    public function getById(int $id){
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user = new User($user_data['id'], $user_data['name'], $user_data['password'], $user_data['mail'], $user_data['role_fk']);
            }
        }
        return $user;
    }

    // If user's Id is null or equal to 0, that's an insert into DB
    public function saveUser(User $user) : string {
        if ($user->getId() === 0 || $user->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO user(username, password, mail, role_fk) VALUES (:username, :password, :mail,:role_fk)
        ");

            $request->bindValue(':username', $user->getUsername());
            $request->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $request->bindValue(':mail', $user->getMail());
            $request->bindValue(':role_fk', $user->getRole());

            $request->execute();

            if ($request) {
                echo "User saved in DB";
                return 'ok';
            }
        }

        // Else it's an User's update
        else {
            $request = DB::getInstance()->prepare("
            UPDATE user SET username = :username, password = :password, mail = :mail, role_fk = :role_fk WHERE id = :id
            ");

            $request->bindValue(':username', $user->getUsername());
            $request->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $request->bindValue(':mail', $user->getMail());
            $request->bindValue(':role_fk', $user->getRole());
            $request->bindValue(':id', $user->getId());

            $request->execute();

            if ($request) {
                echo "User updated";
                return 'ok';
            }
        }

    }


    //Deleted User from DB
    public function delUser(User $user) {
        $request = DB::getInstance()->prepare("
        DELETE FROM user WHERE id = :id;
        ");
        $request->bindValue('id', $user->getId());

        $result = $request->execute();
        if ($result) {
            echo "User supprimé";
        }
    }

}