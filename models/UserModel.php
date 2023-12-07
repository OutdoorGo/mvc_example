<?php

class UserModel {
    private $conn;

    public function __construct($dsn, $username, $password) {
    // Initialiser la connexion PDO dans le constructeur
 
    try {
        $this->conn = new PDO($dsn, $username, $password);
        } catch (PDOException $pe) {
        die ("Could not connect to the database $dbname :" . $pe->getMessage());
        }
    }


    public function create($name, $surname, $mail, $password) {
        // INSERT INTO
        $newUser = $this->conn->prepare("INSERT INTO users (nom,prenom,mail,password) VALUES (?,?,?,?)");
        $newUser->execute([$name, $surname, $mail, $password]);
    }

    public function read() {
        // SELECT * FROM users

        // Si tu es chaud, tu fais une condition if($id) avec $id dans read

        $list_users = $this->conn->prepare("SELECT * FROM users");
        $list_users->execute();
        return $list_users->fetchAll();       
    }

    public function login($mail, $password) {
        $getUser = $this->conn->prepare("
            SELECT *
            FROM users 
            WHERE mail = ? AND password = ?");
        $getUser->execute([$mail, $password]);
        return $getUser->fetch();
    }
       
    public function getDataUser($id) {
        $getUSerData = $this->conn->prepare("
            SELECT *
            FROM bookmarks, bookmarks_users
            WHERE bookmarks.id_bookmark = bookmarks_users.id_bookmark AND bookmarks_users.id_user = ?
        ");
        $getUSerData->execute([$id]);
        return $getUSerData->fetchAll();
    }

    public function update() {
        // UPDATE
       
    }

    public function delete() {
        // DELETE FROM

    }
}
?>
