<?php
include_once 'modelsControllers.php';

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
        if(isset($_POST)){
                $webUser = new userModel();
                $webUser->setEmail($_POST['email']);
                $webUserFind=$webUser->getOneUser($webUser->getEmail());
                if($webUserFind){
                     if(password_verify($_POST['password'],$webUserFind['password'])){ 
                        
                     $_SESSION = array(
                        "login" => true,
                        "data" => array(
                            "email" => $webUser->getEmail(),
                            "time" => time() +60*45 //45 min
                        )
                      );
                      setcookie('token', md5($webUser->getEmail() . time()), time() +60*45);

                        echo 'success';}
                        else{ echo 'Wrong username or password';};
                     
                }else{
                     echo 'Not found web user';  
                }
            }else{
                echo 'Problem with parameters';
            }
    }

    public function ownTaskList(){
        if(isset($_POST['user'])){
            $taskModel = new taskModel();
            $tasksUser=$taskModel->getTasksForUser($_POST['user']);
            $content=null;
            foreach($tasksUser as $task){
                $content.='<tr><td>'.$task['name'].'</td><td>'.$task['description'].'</td><td>'.$task['created'].'</td><td><button type="button" class="btn btn-warning" name="editButton" id="'.$task['id'].'"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger" name="deleteButton" id="'.$task['id'].'"><i class="fas fa-trash-alt"></i></button></td><tr>';
            }
            echo $content;
        }
    }

    public function newTaskForUser(){
        if(isset($_POST)){
            $webUser = new userModel();
            $idUser=$webUser->getIdForEmail($_POST['email']);

            $newTask= new taskModel();
            $newTask->setName($_POST['title']);
            $newTask->setDescription($_POST['description']);
            $idTask=$newTask->saveTask($newTask);

            echo $newTask->saveTaskForUser($idUser,$idTask);

        }else{
            echo 'Problem with parameters';
        }
            
    }

    public function dataTaskForUser(){
        if(isset($_POST['id'])){
            $task = new taskModel();
            echo json_encode($task->getTaskForId($_POST['id']));
        }else{
            echo 'Problem with parameters';
        }
            
    }

    public function removeTaskForUser(){
        if(isset($_POST['id'])){
            $newTask= new taskModel();
            echo $newTask->removeTaskForUser($_POST['id']);
        }else{
            echo 'Problem with parameters';
        }
            
    }

    public function editTaskForUser(){
        if(isset($_POST)){
            $editTask = new taskModel();
            $editTask->setId($_POST['id']);
            $editTask->setName($_POST['title']);
            $editTask->setDescription($_POST['description']);

            echo $editTask->editTaskForUser($editTask);
        }else{
            echo 'Problem with parameters';
        }
            
    }
}