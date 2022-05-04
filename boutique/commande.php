<?php

require 'classes/panierclass.php';
require 'classes/produitclass.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
</head>
<body>


<?php
$query = "SELECT * FROM produits";
$records_per_page = 3;

$produits = new Produits();

$newquery = $produits->pagination($query, $records_per_page);
$data = $produits->dataview($newquery);
$produits->paginglink($query, $records_per_page);
$page = $_GET['page'];
foreach ($data as $produit) {
    // var_dump($produit);
    ?>
    <div class="d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="images/<?= $produit['image'] ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?= $produit['nom'] ?></h5>
      <p class="card-text"><?= $produit['description'] ?></p> 
          <a href=''>commander</a>
    </div>
  </div>
    </div>
      
      <?php
  }
  
  
  
    echo  "<a href='commande.php?id={$produit['id']}"
    ?>


    
</body>
</html>