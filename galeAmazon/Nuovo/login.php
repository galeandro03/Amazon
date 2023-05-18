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
    include("./header.html");
    require 'conndb.php';

    if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];
        echo "<h1> Ciao".$username."<h1>";
    
?>
    <p>
        <a href="logout.php">Logout </a>
    </p>

<?php
}else{
?>

    <h1>Login</h1>
    <form action="./login.php" method="post">
        <p> <b>Username </b></p>
        <input type="text" name="username">
        <p><b>Password </b></p>
        <input type="password" name="pass">
        <br>
        <input type="submit" value="Login"></input>
    </form>


    <p>
        Se non sei ancora registrato
        <a href="registrati.php">Clicca qui </a>
        </p>
    
    <?php
    }
    ?>