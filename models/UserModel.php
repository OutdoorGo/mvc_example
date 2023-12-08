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
            FROM users 
            WHERE id_user = ?
        ");
        $getUSerData->execute([$id]);
        return $getUSerData->fetch();
    }
       
    public function getBookmarksUser($id) {
        $getUSerBooks = $this->conn->prepare("
            SELECT *
            FROM bookmarks, bookmarks_users
            WHERE bookmarks.id_bookmark = bookmarks_users.id_bookmark AND bookmarks_users.id_user = ?
        ");
        $getUSerBooks->execute([$id]);
        return $getUSerBooks->fetchAll();
    }

    public function getBookmarkCatgories($id) {
        $getUSerBooks = $this->conn->prepare("
            SELECT *
            FROM categories, bookmarks_categories
            WHERE categories.id_category = bookmarks_categories.id_category AND bookmarks_categories.id_bookmark = ?
        ");
        $getUSerBooks->execute([$id]);
        return $getUSerBooks->fetchAll();
    }

    public function getAllCategories(){
        $list_categories = $this->conn->prepare("SELECT * FROM categories");
        $list_categories->execute();
        return $list_categories->fetchAll();
    }

    public function insertBookmark($name, $link, $id, $list_cat) {
        $date = new DateTimeImmutable();
        $date_ajout = $date->format('Y-m-d H:i:s');
        // INSERT INTO
        $newBookmark = $this->conn->prepare("INSERT INTO bookmarks (nom, url, date_ajout) VALUES (?,?,?)");
        $newBookmark->execute([$name, $link, $date_ajout]);
        $lastBookMarkId =  $this->conn->lastInsertId();
        
        $AddToUSer = $this->conn->prepare("INSERT INTO bookmarks_users (id_user, id_bookmark) VALUES (?,?)");
        $AddToUSer->execute([$id, $lastBookMarkId]);

        foreach ($list_cat as $cat){
            $AddCatToBook = $this->conn->prepare("INSERT INTO bookmarks_categories (id_bookmark, id_category) VALUES (?,?)");
        $AddCatToBook->execute([$lastBookMarkId, $cat]);
        }
    }

    public function deleteBookmark($id) {
        //suppression des entrées du bookmarks dans la table bookmarks_categories
        $delete_cat_book = $this->conn->prepare('
            DELETE 
            FROM bookmarks_categories 
            WHERE id_bookmark = ?
            AND EXISTS(
                SELECT *
                FROM bookmarks_categories 
                WHERE id_bookmark = ?
                )
        ');
        $delete_cat_book->execute([$id,$id]);
        
        //suppression des entrées du bookmarks dans la table bookmarks_users
        $delete_user_book = $this->conn->prepare('
            DELETE 
            FROM bookmarks_users 
            WHERE id_bookmark = ?
        ');
        $delete_user_book->execute([$id]);
    }

    public function update() {
        // UPDATE
       
    }

    public function delete() {
        // DELETE FROM

    }
}
?>
