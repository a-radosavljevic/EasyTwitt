<?php
include_once 'User.php';
include_once 'UserDB.php';
include_once 'MySmarty.php';
session_start();

$user=$_SESSION["activeUser"];
$smarty= new MySmarty();

include_once 'headerLogged.php';

if(isset($_GET["btnChangeProfile"]))
{   
    $name=$user->name;
    $surname=$user->surname;
    $email= $user->email;
	$username= $user->username;
	//$password= $user->password;
    $smarty->assign("user", $user);
    $smarty->assign("name", $name);
    $smarty->assign("surname", $surname);
    $smarty->assign("username", $username);
    $smarty->assign("email", $email);
	//$smarty->assign("password", $password);
	$smarty->display("ChangeProfile.tpl");

}

else if(isset($_POST["btnSaveChangedProfile"]))
{

		//kao u prethodnom if kad se klikne dugme snimiIzmene
		//ovde da se pokupi sve iz inputa i poziva se funkcija za  /*updateMajstor koju treba napraviti*/
     
    $name=$_POST["txtName"];
    $surname=$_POST["txtSurname"];
    $username=  $_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $password2=$_POST["txtPassword2"];
    
    
    if($password!=$password2)
    {
        echo "<script type='text/javascript'>alert('Passwords dont match!');</script>";
        echo "<script type='text/javascript'>window.history.go(-1);</script>";
        exit();
      
    }
	else 
	{
        UserDB::UpdateUser2($user, $username, $name, $surname, $password);
       
           header("location:actionLog.php");
           exit();

	}
}
else
    if (isset ($_POST["btnCancel"]))
    {
        header("location:actionLog");
        exit();
    }
    else
        if(isset ($_POST["btnDelete"]))
        {
            UserDB::DeleteUser($user);
            unset($_SESSION["activeUser"]);
             header("location:index.php");
        exit();
        }
include_once 'footer.php';