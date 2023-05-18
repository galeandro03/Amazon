<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/stile.css" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="./css/prodotti.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include("./header.html");
    require'conndb.php';
?>
<h1>HOME

</h1>
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>NOME</th>
            <th>CATEGORIA</th>
            <th>PREZZO</th>
            <th>IMMAGINE</th>
        </tr>
<?php

    $stmt2=$conn->prepare("SELECT p.nome as nomeP, p.id as id_prodotto, p.prezzo as prezzo,p.immagine as immagine,c.nome as categoria FROM dbecommerce.prodotti p,dbecommerce.categorie c where p.id_categoria=c.id ");
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $conn->close();
    if($result2->num_rows >0){
        while($row=$result2->fetch_assoc()){
            echo " <tr> ";
            echo " <td> ".$row["nomeP"]." </td> ";
            echo " <td> <b> ".$row["categoria"]."</b> </td> ";
            echo " <td> ".$row["prezzo"]."€ </td> ";
            echo " <td> <img src=\"./images/".$row["immagine"]."\" class=\"imgw\"></td> ";
            ?>
            <td>
            <form action="add_product.php" method="POST">
                <input name="id_prodotto" hidden value="<?php echo $row["id_prodotto"]; ?>">
                <select name="qty" class="quantitaStyle">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <button type="submit" class="btn btn-primary " name="add_to_cart">Aggiungi al carrello</button>
            </form>
    <td>
            <?php
            echo " </tr>";
        }
    }else {
        echo "<br> Nessun prodotto trovato <br>";
    }
?>
    </table>
</div>

  
</body>
</html>