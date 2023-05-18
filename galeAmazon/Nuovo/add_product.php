<?php

session_start();
#isset($_SESSION['id_utente'])&& 

if(isset($_POST['add_to_cart']))
{
    $userID=$_SESSION['id_utente'];
    $prodID=$_POST['id_prodotto'];
    $qty=$_POST['qty'];

    require 'conndb.php';

    $stmt=$conn->prepare("SELECT id,quantita FROM dbecommerce.carrello where id_utente=? AND id_prodotto=?");
    $stmt->bind_param("ii",$userID,$prodID);
    $stmt->execute();
    $resultC=$stmt->get_result();
    $res=$resultC->fetch_assoc();
    if($res){
        $id_carrello=$res["id"];
        $current_qty=$res["quantita"];
        $current_qty+=$qty;

        $stmt2= $conn->prepare("UPDATE dbecommerce.carrello SET quantita=? WHERE id=?");
        $stmt2->bind_param("ii",$current_qty,$id_carrello);
        $stmt2->execute();
        $conn->close();
        header("Location: carrello.php");
        die();
    }
    else
    {
        $stmt3=$conn->prepare("INSERT INTO dbecommerce.carrello(id_utente, id_prodotto,quantita)VALUES(?,?,?)");
        $stmt3->bind_param("iii",$userID,$prodID,$qty);
        $stmt3->execute();
        $conn->close();
        header("Location: carrello.php");
        die();
    }

}