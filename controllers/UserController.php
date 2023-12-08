<?php


require_once 'models/UserModel.php';

class UserController {
    private $dsn;
    private $username;
    private $password;

    public function __construct($dsn, $username, $password) {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    public function create() {
        // Create an instance of the UserModel
        $UserModel = new UserModel($this->dsn, $this->username, $this->password);
        
        // Get User data from the model
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password'])) {
            $UserModel->create($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
            
            // à intégrer directement dans index.php
            $id = $UserModel->login($_POST['mail'], $_POST['password']);
            $user_bookmarks = $UserModel->getDataUser($id['id_user']);
            include 'views/User_display.php';
        }else{
            include 'views/User_create.php';
        }
        
        // Load the view
        
    }

    public function read() {
        // Create an instance of the UserModel
        $UserModel = new UserModel($this->dsn, $this->username, $this->password);
        
        // Get User data from the model
        $users = $UserModel->read();
        
        // Load the view
        include 'views/User_read.php';
    }

    public function login() {
        $UserModel = new UserModel($this->dsn, $this->username, $this->password);
        if (isset($_POST['mail']) && isset($_POST['password'])){
            $id = $UserModel->login($_POST['mail'], $_POST['password']);
            $_SESSION['id_user'] = $id['id_user'];
            header('Location: index.php?action=connected');
        }else{
            header('Location: index.php?action=index');
        }
    }

    public function displayUSerConnected(){
        $UserModel = new UserModel($this->dsn, $this->username, $this->password);
        $user_data = $UserModel->getDataUser($_SESSION['id_user']);
        $user_bookmarks = $UserModel->getBookmarksUser($_SESSION['id_user']);
        
        foreach($user_bookmarks as $key =>$bookmark){
            $categories_bookmarks[$key] = $UserModel->getBookmarkCatgories($bookmark['id_bookmark']);
        }

        //categorie à ajouter
        $list_categories = $UserModel->getAllCategories();
       
        if (isset($_POST['BookName']) && isset($_POST['BookLink'])) {
            $UserModel->insertBookmark($_POST['BookName'], $_POST['BookLink'], $_SESSION['id_user'], $_POST['category']);
            header('Location: index.php?action=connected');
        }

        // suppression d'un signet
        if (isset($_POST['supprimer'])) {
            $UserModel->deleteBookmark($_POST['supprimer']);
            header('Location: index.php?action=connected');
        }

        // Load the view
        include 'views/AddModule.php';
        include 'views/User_display.php';
    }

}

?>
