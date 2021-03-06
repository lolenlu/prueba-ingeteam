<?php
require_once 'baseModel.php';

class taskModel extends baseModel{
    
    public int $id;
    public string $name;
    public string $description;

    public function __construct(){
        parent::__construct();
    }
    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $this->conn->real_escape_string($name);
    }

    public function setDescription(string $description){
        $this->description = $this->conn->real_escape_string($description);
    }

    public function getId(){
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function saveTask(taskModel $newTask){
        try {

            $now=date('Y-m-d h:m:s');
            $name=$newTask->getName();
            $description = $newTask->getDescription();
    
            $stmt = $this->conn->prepare("INSERT INTO `task` (`id`, `created`, `name`, `description`) VALUES (NULL, ?, ?, ?)");
            $stmt->bind_param("sss",$now,$name,$description);
            $stmt->execute();
            return $stmt->insert_id;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    }

    public function getTasksForUser(string $emailUser){
        try {
            $stmt = $this->conn->prepare("SELECT t.* FROM web_user u, task t, web_user_task wt WHERE u.id=wt.web_user_id AND t.id=wt.task_id AND u.email=?");
            $stmt->bind_param("s", $emailUser);
            $stmt->execute();
            return $stmt->get_result();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTaskForId(int $idTask){
        try {
        $stmt = $this->conn->prepare("SELECT * FROM task WHERE id=?");
        $stmt->bind_param("i", $idTask);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function saveTaskForUser(int $webUserId, int $taskId){
        try {
            $now=date('Y-m-d h:m:s');
            $stmt = $this->conn->prepare("INSERT INTO `web_user_task` (`id`, `web_user_id`, `task_id`,`created`) VALUES (NULL, ?, ?, ?)");
            $stmt->bind_param("iis",$webUserId,$taskId,$now);
            $stmt->execute();
            return true;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    }

    public function removeTaskForUser(int $taskId){
        try {
            $now=date('Y-m-d h:m:s');
            $stmt = $this->conn->prepare("DELETE FROM `web_user_task` WHERE task_id=?");
            $stmt->bind_param("i",$taskId);
            $stmt->execute();

            $stmt = $this->conn->prepare("DELETE FROM `task` WHERE id=?");
            $stmt->bind_param("i",$taskId);
            $stmt->execute();

            return true;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    }

    public function editTaskForUser(taskModel $editTask){
        try {
            $id=$editTask->getId();
            $name=$editTask->getName();
            $description = $editTask->getDescription();

            $stmt = $this->conn->prepare("UPDATE `task` SET name=?,description=? WHERE id=?");
            $stmt->bind_param("ssi",$name,$description,$id);
            $stmt->execute();

            return true;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    }
}