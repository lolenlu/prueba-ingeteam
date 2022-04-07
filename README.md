# PROYECT INGETEAM

This project tries to solve the problem of task management for the employees of a company, who need a task manager that allows them to carry out an adequate organization on a day-to-day basis.

This tool allows the creation of users, to later be able to carry out an individualized management of their own tasks, allowing them to create, edit and delete the tasks that they require.

### INSTALLATION
For the installation of the project it is only necessary to make a clone of the public repository where it is located

To do this, go to the directory where you want to clone, and using the CMD console, execute the following code:

`$ git clone https://github.com/lolenlu/prueba-ingeteam.git`

If you wish, you can access the repository link to download the project in other ways

`<link>` : <https://github.com/lolenlu/prueba-ingeteam>

Entonces, deberá crear su base de datos con el gestor de base de datos que utilice. Una vez creado su DB, deberá cargar el archivo:
 
- prueba-ingeteam/config/migration/init.sql

Next, get ready to correctly configure the connection with your DB:

```php
class Database{
    public static function connect(){
        $db = new mysqli(SERVER,USER,PASSWORD,BD); //CONFIG LOCAL CONNECTION
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
```

**Once these steps are done, everything will be ready!**

### Features

- PHP: 7.4.9
- Apache: 2.4.46
- PhpMyAdmin: 5.1.3
- MySql: 5.7.31

###Use Application

First you must register a user to access the application Panel. To do this we will click on the link ''Create One".

Once we have filled out the form, and having validated all the data, it will indicate that the record has been successfully created, and it will automatically take us to the Login with the data we have entered.

If we give 'Sign in', it will allow us to enter the Panel. Inside, we can perform task creation, task editing and task deletion actions. If we want to log out of our user, we can select the 'Log out' button in the panel header.



### FlowChart
```flow
st=>start: Register
op=>operation: Login
cond=>condition: Successful Yes or No?
op2=>end: Panel

st->op->cond
cond(yes)->op2
cond(no)->op
```

### Diagram Tables
                    
```seq
webUser->webUserTask: web_user_id
task->webUserTask: task_id
```
