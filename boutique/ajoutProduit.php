<?php

require 'classes/adminclass.php';
require 'classes/produitclass.php';


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Ajout produit</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Produit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="panier.php">Action</a>
          <a class="dropdown-item" href="">Another action</a>
          <a class="dropdown-item" href="">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
  <div class="container">
    <form method="POST" enctype="multiport/form-data">
      <h2>Ajout produit</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" placeholder="nom produit" id="last" name="nom">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Description">Description</label>
            <textarea type="text" class="form-control" placeholder="prenom" name="description" id="first" maxlength="255"></textarea>
          </div>
        </div>
        <!--  col-md-6   -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="prix">prix</label>
            <input type="number" class="form-control" placeholder="nom" id="last" name="prix">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="id_category">id category</label>
            <input type="number" class="form-control" placeholder="nom" id="last" name="id_categorie">
          </div>
        </div>
        <!--  col-md-6   -->
      </div>



      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?php










            ?>
            <!-- </div>


        </div><--  col-md-6   -->


            <div class="col-md-6">

              <div class="form-group">
                <label for="password">Quantité</label>
                <input type="number" min="0" class="form-control" id="phone" placeholder="password confirm" name="quantite">
              </div>
            </div>
            <!--  col-md-6   -->
          </div>
          <!--  row   -->


          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="Image">Image</label>
                <input type="file" class="form-control" id="email" placeholder="image" name="image">
              </div>
            </div>
            <!--  col-md-6   -->


            <!--  col-md-6   -->
          </div>
          <!--  row   -->





        </div>
        <br><br>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button><br>
        </div>
    </form>
  </div>
</body>
<?php
if (isset($_POST['submit'])) {
  $quantite = $_POST['quantite'];
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $id_categorie = $_POST['id_categorie'];
  $image = $_POST['image'];
  $produit = new Produits();
  $produit->add($nom, $description, $prix, $id_categorie, $quantite, $image);
}


?>









</html>

<?