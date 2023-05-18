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
