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
        $UserModel->create($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
        
        // Load the view
        include 'views/User_create.php';
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
        $id = $UserModel->login($_POST['mail'], $_POST['password']);
        $user_bookmarks = $UserModel->getDataUser($id['id_user']);
        
        // Load the view
        include 'views/User_display.php';
    
    }
}

?>
