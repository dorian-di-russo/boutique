<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["email"]);
unset($_SESSION["nom"]);
unset($_SESSION["prenom"]);
unset($_SESSION["id"]);
header("Location:index.php");
?>