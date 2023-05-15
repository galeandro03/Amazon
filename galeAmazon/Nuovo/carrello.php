<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/stile.css" rel="stylesheet">
    <title>Carrello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<?php
    session_start();
    include("./header.php");
    require'conndb.php';


    if(!isset($_SESSION["id_utente"])){
        echo "<br> Effettuare il login <br>";
        $conn->close();
        header("Location: login.php");
        die();
    }else
    {
        $username=$_SESSION["username"];
        echo "<h1> Carrello di $username </h1>";
            $id_utente=$_SESSION["id_utente"];
            $stmt2=$conn->prepare("SELECT ca.id_utente,ca.id_prodotto,ca.quantita,p.nome,p.immagine,p.prezzo,ca.id FROM dbecommerce.carrello ca,dbecommerce.prodotti p where ca.id_utente=? and ca.id_prodotto=p.id");
            $stmt2->bind_param("i",$id_utente);
            $stmt2->execute();
            $result2=$stmt2->get_result();
            $conn->close();
            echo "<h2>Prodotti aggiunti:</h2>";
            if($result2->num_rows > 0){
                while($row =$result2->fetch_assoc()){
            ?>
                    <ul class="cart">
                    <li>
                        <?php echo $row["quantita"]."X" ?>
                    </li>
                    <li>
                        <?php echo $row["nome"] ?>
                    </li>
                    <li>
                        <img class="imgProdotto" src="img/<?php echo $row["immagine"] ?>" alt="<?php echo $row["nome"]?>">
                    </li>
                    <li>
                        <?php echo $row["prezzo"]."€" ?>
                    </li>
                    <li>
                        <form action="remove_product.php" method="POST">
                        <input name="id_carrello" hidden value=" <?php echo $row["id"];?>">
                            <button id="elimina" class="btn btn-primary" name ="remove_from_cart">Rimuovi</button>
                        </form>
                    </li>
                    </ul>
                <?php
                }
            ?>
                <form action="ordini.php" method="post">
                    <button name="order_confirm" class="btn btn-primary" type="submit">Conferma Ordine </button>
                </form>
            <?php
            }
            else {
               echo "<br> <h3> Nessun prodotto nel carrello </h3><br>";

            }
    }
?>
    
</body>
</html>