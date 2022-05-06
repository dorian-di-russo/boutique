<?php
require 'require/_header.php';
$products =$db->request('SELECT * FROM produits LIMIT 3 ');



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body class="d-flex flex-column min-vh-100">
  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acceuil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produit.php">Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      
    </ul>
  </div>
</nav>

<div>

</div>
<div class="container">
  <div class="row">
<?php foreach($products as $product): ?>
  
<div class="card" style="width: 18rem;">
  <img class="card-img-top" id="img" src="images/<?= $product->image;?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product->nom; ?></h5>
    <p class="card-text"><?= utf8_decode($product->description); ?></p>
    <p class="card-text"><?= "quantité  ".": ". utf8_decode($product->quantite); ?></p>

    <p class="card-text"><?= number_format($product->prix, 2,',','') . " "."€"; ?></p>
 
   
  </div>
</div>
    <?php endforeach; ?>
    </div>
</div>
<footer class=" mt-auto  bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</body>
</html>