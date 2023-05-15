<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/prodotti.css">
    <link href="./css/stile.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
require 'conndb.php';
include("./header.php");

if(isset($_POST["username"])){
    $username=$_POST["username"];
}
else{
    $username="";
    echo "<br> Credenziali non valide </br>";
    echo "<a href=\index.php\"> HOME </a>";
    exit(1);
}

if(isset($_POST["pass"])){

    $password=$_POST["pass"];
    $userMd5Pass=md5($password);

    $stm2=$conn->prepare("SELECT username,password FROM dbecommerce.utenti where username=? and password=?");
    $stm2->bind_param("ss",$username,$userMd5Pass);
    $stm2->execute();
    $result2=$stm2->get_result();

    if($result2->num_rows >0){
        if($row=$result2->fetch_assoc()){
            $_SESSION['username']=$username;
            header("Location:index.php");
            die();
        }
    }else{
        echo "<br> Credenziali non valide <br>";
        echo"<a href=\"index.php\">HOME </a>";
    }


}