<?php

session_start();

if(isset($_SESSION['idutente'])&& isset($_POST['order_confirm']))
{
    $userID=$_SESSION['id_utente'];
    require 'conndb.php';

    $stmt=$conn->prepare("SELECT c.id,c.id_prodotto,c.quantita,p.prezzo FROM dbecommerce.carrello c,dbecommerce.prodotti p WHERE c.id_udente=? AND c.id_prodotto=p.id");
    $stmt->bind_param("i",$userID);
    $stmt->execute();
    $resultC=$stmt->get_result();

    if($resultC->num_rows > 0){
        $dataOrdine="";
        $stmt2=$conn->prepare("INSERT INTO dbecommerce.ordini(id_utente,order_date)VALUES(?,?); ");
        $stmt2->bind_param("iw",$userID,$dataOrdine);
        $stmt2->execute();
        $stmt2=$conn->prepare("SELECT LAST_INSERT_ID();");
        $stmt2->execute();
        $orderId=$stmt2->get_result()->fetch_array()[0];

        while($row=$resultC->fetch_assoc())
        {
            $stmt3=$conn->prepare("INSERT INTO dbecommerce.ordini_prodotti(id_ordine,id_prodotto,quantita,prezzo)VALUES(?,?,?,?); ");
            $stmt3->bind_param("iiid",$orderId,$row['id_prodotto'], $row['quantita'],$row['prezzo']);
            $stmt3->execute();

        }

        $stmt4=$conn->prepare("DELETE FROM dbecommerce.carrello where id_utente=?");
        $stmt4->bind_param("i",$userID);
        $stmt4->execute();
        $stmt4->close();

        header("Location: ordini.php");
        die();
    }
    else
    {
        $conn->close();
    }
}else if(isset($_SESSION['id_utente'])){

    ?>

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
    <title>Ordini</title>
</head>
<body>
<?php
    include("./header.php");
    require 'conndb.php';
    $username =$_SESSION["username"];
    echo "<h1> Ordini di $username </h1>";
?>
<?php
    require 'conndb.php';
    $userID=$_SESSION['id_utente'];

    $stmt2=$conn->prepare("SELECT p.nome,o.order_date,op.quantita,op.prezzo FROM dbecommerce.ordini o,dbecommerce.ordini_prodotti op,dbecommerce.prodotti p WHERE o.id_utente=? AND op.id_ordine=o.id AND p.id=op.id_prodotto");
    $stmt2->bind_param("i",$userID);
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $totale=0;
    if($result2->num_rows >0){
    ?>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>Quantita</th>
                <th>Prezzo</th>
            </tr>
        <?php
        while($row =$result2->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>".$row["nome"]."</td>";
            echo "<td> <b>".$row["quantita"]."</b></td>";
            echo "<td>".$row["prezzo"]."€ </td>";
            echo "</tr>";

            $totale += ($row["prezzo"] * $row["quantita"]);
        }
        ?>
    </table>
<h3>Totale: <?php echo $totale ?> € </h3>

<div class="row">
        <form class="formStyle" action="annulla_ordine.php" method="post">
            <button name="annulla_ordine" class="btn btn-primary btnSinistra" type="submit">Annulla Ordine</button>
        </form>

        <form class="formStyle" action="acquista.php" method="post">
            <button name="acquista" class="btn btn-primary btnDestra" type="submit">Acquista</button>
        </form>
    </div>
    </div>
    


</body>
</html>







































}
