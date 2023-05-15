<?php

session_start();

if(isset($_SESSION['idutente'])&& isset($_POST['annulla_ordine']))
{
    $userID=$_SESSION['id_utente'];
    require 'conndb.php';

    $stmt=$conn->prepare("SELECT id FROM dbecommerce.ordini WHERE id_utente=?");
    $stmt->bind_param("i",$userID);
    $stmt->execute();
    $resultC=$stmt->get_result();

    if($result->num_rows >0){
        while($row =$result->fetch_assoc()){
            $stmt2=$conn->prepare("DELETE FROM dbecommerce.ordini_prodotti WHERE id_ordini=?");
            $stmt2->bind_param("i",$row["id"]);
            $stmt2->execute();


            $stmt3=$conn->prepare("DELETE FROM dbecommerce.ordini where id=?");
            $stmt3->bind_param("i",$row["id"]);
            $stmt3->execute();
        }
    }
    
    $conn->close();
    header("Location: prodotti.php");
    die();
}
