<?php
include_once 'models/userModel.php';

class userController {
    public function register(){
        if(isset($_POST)){
            $webUser = new userModel();
            $webUser->setName($_POST['name']);
            $webUser->setEmail($_POST['email']);
            $webUser->setDescription($_POST['description']);
            $webUser->setAddress($_POST['address']);
            $webUser->setPostalCode($_POST['postalCode']);
            $webUser->setPassword($_POST['password']);

            echo $webUser->saveUser($webUser);
        }else{
            echo 'Problem with parameters';
        }
            
    }
    public function login(){
            echo 'example';
    }
}