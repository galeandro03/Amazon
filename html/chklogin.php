<?php
session_start();
include("conndb.php");

$q = "SELECT id_user, admin FROM users WHERE mail = '$_POST[txtUsernameOrMail]' OR username = '$_POST[txtUsernameOrMail]'";

$result = $conn->query($q);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
    $_SESSION["id_user"] = $row["id_user"];
    $_SESSION["admin"] = $row["admin"];
    header("location:index.php");
} else {
    header("location:login.php?msg=Controllare username e password.");
}
