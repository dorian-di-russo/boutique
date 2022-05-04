<?php
require 'classes/adminclass.php';
require 'classes/produitclass.php';
require 'classes/dbtest.php';
var_dump($_FILES);
var_dump($_POST);

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


$query = "SELECT * FROM produits";
$records_per_page = 3;

$produits = new Produits();

$newquery = $produits->pagination($query, $records_per_page);
$data = $produits->dataview($newquery);
$produits->paginglink($query, $records_per_page);








foreach ($data as $produit) {
  // var_dump($produit);
  ?>
  <div class="d-flex justify-content-center">
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/<?= $produit['image'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
    
    <?php
}



  ?>



  <?
  ?>
  </div>

  </div>

</html>