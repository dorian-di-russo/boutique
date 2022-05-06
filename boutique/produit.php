<?php

require 'require/header.php';
if(!$_SESSION === true)
{
    header ('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php ;
 
    
    
    $products =$db->request('SELECT * FROM produits ');
    ?>
<?php foreach($products as $product): ?>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/<?= $product->image;?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product->nom; ?></h5>
    <p class="card-text"><?= utf8_decode($product->description); ?></p>
    <p class="card-text"><?= "quantité  ".": ". utf8_decode($product->quantite); ?></p>

    <p class="card-text"><?= number_format($product->prix, 2,',','') . " "."€"; ?></p>
 
    <a class='addPanier' href="addpanier.php?id=<?= $product->id;?>" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>
    <?php endforeach; ?>

    <footer>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src='js/app.js'></script>
    </footer>
</body>
</html> 