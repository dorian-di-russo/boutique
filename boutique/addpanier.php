<?php
require 'require/_header.php';
$json = array('error' => true);
if (isset($_GET['id'])) {
    $product =  $db->request('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));

    if (empty($product)) {
        $json['message'] = "ce produit n'existe pas";
    }
    $panier->add($product[0]->id);
    $json['error'] = false;
    $json['message'] = 'ce produit a bien été ajouté a votre panier';
    // var_dump($product);
} else {
    $json['message'] = "Vous n'avez pas choisi de produits";
} 
?>