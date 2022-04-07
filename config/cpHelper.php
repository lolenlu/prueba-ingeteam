<?php
ob_start();
if (isset($_SESSION["login"])) {

    if ($_SESSION["data"]["time"] >= time()) {
        if(isset($_COOKIE["token"])) { 
			//OK
        }else{
			$_SESSION["login"] = false;
			header('Location:'.base_url); 
			exit();
		}
    }
    else { echo 'NO2!';
       $_SESSION["login"] = false;
        header('Location:'.base_url); 
        exit();
    }
}
else { 
    if (basename($_SERVER["REQUEST_URI"]) !== "login.php") {
        header('Location:'.base_url);
    }
}
ob_end_flush();
?>