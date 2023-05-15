<?php 
session_start();
require 'conndb.php';

if($_SERVER['REQUEST_METHOD']==='POST'){

    if(isset($_POST['registrati'])){

        if(isset($_POST["username"])){
            $username=$_POST["username"];
            echo "set|".$username."|";
        }
        else{
            echo "|".$username."|";
            $username="";
        }
        if(isset($_POST["nome"])){
            $nome=$_POST["nome"];
        }
        else{
            $nome="";
        }
        if(isset($_POST["cognome"])){
            $cognome=$_POST["cognome"];
        }
        else{
            $cognome="";
        }
        if(isset($_POST["email"])){
            $email=$_POST["email"];
        }
        else{
            $email="";
        }
        if(isset($_POST["password"])){
            $password=$_POST["password"];
        }
        else{
            $password="";
        }

        $passMd5=md5($password);


        $stmt=$conn->prepare("INSERT INTO dbecommerce.utenti (nome,cognome,email,password,username)VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$cognome,$email,$passMd5,$username);
        $stmt->execute();
        $result=$stmt->get_result();
        $conn->close();


        $_SESSION['username']=$username;
        header("Location:index.php");
        die();

    }else{
        echo "errore";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Registrazione</title>
</head>
<body>
    
<h1>Registrazione</h1>
<form action="./registrati.php" method="post">
    <div id="name">
        <label>Nome</label>
        <input type="text" id="nameID" name="nome" onkeyup="textValidate(this)">
        <span id="nameID_check"></span>
    </div>
    <div id="surname">
        <label>Cognome</label>
        <input type="text" id="surnameID" name="cognome" onkeyup="textValidate(this)">
        <span id="surnameID_check"></span>
    </div>
    <div id="username">
        <label>Username</label>
        <input type="text" id="usernameID" name="username" onkeyup="textValidate(this)">
        <span id="usernameID_check"></span>
    </div>
    <div id="email">
        <label>Email</label>
        <input type="text" id="emailID" name="email" onkeyup="textValidate(this)">
        <span id="emailID_check"></span>
    </div>
    <div id="password">
        <label>Password</label>
        <input type="password" id="passwordID" name="password" onkeyup="textValidate(this)">
        <span id="passwordID_check"></span>
    </div>

    <input id="registratiBtn" type="submit" name="registrati" value="registrati"></input>

</body>
</html>