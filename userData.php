<?php
session_start();
class userData
{
    public $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function findOneUser($login, $password)
    {
        $q = "SELECT * FROM users WHERE login=:login and password =:password";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute(["login" => $login, "password" => $password]);
        return $stmt->fetch();
    }

    public function findNick($nick)
    {
        $q = "SELECT * FROM users WHERE nick =:nick";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute(["nick" => $nick]);
        return $stmt->fetch();
    }

    public function findLogin($login)
    {
        $q = "SELECT * FROM users WHERE login =:login";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute(["login" => $login]);
        return $stmt->fetch();
    }

    function loginUser($login, $password)
    {
        $res = $this->findOneUser($login, $password);
        if ($res) {
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $res->id_users;
        } else {
            $_SESSION["auth"] = false;
        }
    }

    public function registrations($data)
    {
        $nic = $this->findNick($data["nick"]);
        $log = $this->findLogin($data["login"]);
        if ($nic == true || $log == true) {
            $_SESSION["error"] = "Пользователь с таким логином или ником уже существует";
        } else {
            $reg = "INSERT INTO users(login,password,nick) VALUES  (:login,:password,:nick)";
            $stmt = $this->pdo->prepare($reg);
            $stmt->execute([
                "login" => $data["login"],
                "password" => $data["password"],
                "nick" => $data["nick"]
            ]);
        }
    }


    public function getImage()
    {
        $im = "SELECT * FROM images WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($im);
        $stmt->execute(["id_users" => $_SESSION["id"]]);
        return $stmt->fetchAll();
    }


    public function logout()
    {
        unset($_SESSION["auth"]);
        session_destroy();
    }
    public function uploadImage($image)
    {
        $reg = "INSERT INTO images(image, id_users) VALUES (:image, :id_users)";
        $stmt = $this->pdo->prepare($reg);
        $stmt->execute([
            "image" => $image,
            "id_users" => $_SESSION["id"]
        ]);
    }
    public function getAllImage() {
        $im = "SELECT * FROM images";
        $stmt = $this->pdo->prepare($im);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
