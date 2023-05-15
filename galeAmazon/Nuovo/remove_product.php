<?php

session_start();

if(isset($_SESSION['idutente'])&& isset($_POST['id_carrello'])&& isset($_POST['remove_from_cart']))
{
    $userID=$_SESSION['id_utente'];
    $cartID=$_POST['id_carrello'];

    require 'conndb.php';

    $stmt=$conn->prepare("DELETE FROM dbecommerce.carrello where id=?");
    $stmt->bind_param("i",$cartID);
    $stmt->execute();
    $conn->close();

    header("Location: carrello.php");
    die();
}
