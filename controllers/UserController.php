<?php
require_once 'models/UserModel.php';

class UserController {
    public function create() {
        // Create an instance of the UserModel
        $UserModel = new UserModel();
        
        // Get User data from the model
        $UserModel->create($_POST['name'], $_POST['age']);
        
        // Load the view
        include 'views/User_create.php';
    }

    public function read() {
        // Create an instance of the UserModel
        $UserModel = new UserModel();
        
        // Get User data from the model
        $users = $UserModel->read();
        
        // Load the view
        include 'views/User_read.php';
    }
}

?>
