<?php
include("conndb.php");
session_start();
if ($_POST['txtPass'] == $_POST['txtPassConfirm']) {
    $q = "SELECT * FROM users WHERE username = '$_POST[txtUsername]' OR mail = '$_POST[txtMail]'";
    $result = $conn->query($q);
    if ($result->$num_rows > 0) {
        header("location:register.php?msg=Username o mail giá usata.");
    } else {
        $stmt = $conn->prepare("INSERT INTO users (mail, username, pass, name, surname) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $mail, $username, $pass, $name, $surname);
        // set parameters and execute
        $mail = $_POST['txtMail'];
        $username = $_POST['txtUsername'];
        $pass = ($_POST['txtPass']);
        $name = $_POST['txtName'];
        $surname = $_POST['txtSurname'];
        $stmt->execute();
        $q = "SELECT id_user FROM users WHERE username = '$_POST[txtUsername]' OR mail = '$_POST[txtMail]'";
        $result = $conn->query($q);
        $row = $result->fetch_assoc();
        $_SESSION["id_user"] = $row["id_user"];
        header("location:index.php");
    }
} else {
    header("location:register.php?msg=Le password non corrispondono.");
}
