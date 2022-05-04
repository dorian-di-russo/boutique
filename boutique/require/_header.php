<?php
require 'classes/dbconstruct.php';
require 'classes/panierclass.php';
$db = new Database;
$panier = new panier($db);

?>