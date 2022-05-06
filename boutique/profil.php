<?php
session_start();
require 'classes/signupclass.php';
var_dump($_SESSION);
// var_dump($_POST);
if(!$_SESSION['login'] === true)
{
    header ('location: index.php');
}

$login = $_SESSION['login'];
$info = new register();



try {
  if (isset($_POST['submit'])) {
    $login = trim(htmlspecialchars($_POST['login']));
    $prenom = trim(htmlspecialchars($_POST['prenom']));
    $nom = trim(htmlspecialchars($_POST['nom']));
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    $email = trim(htmlspecialchars($_POST['email']));
    $user = new register;
    $user->userUpdate($login,$prenom,$nom,$password,$repassword,$email);
  }
} catch (Exception $e) {
  echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Modifier profil</title>
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
        <a class="nav-link" href="#">Acceuil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Produit</a>
      </li>
      <li class="nav-item">
  
       

        <a class="nav-link" href="logout.php">Déconnexion</a>
      </li>
      
    </ul>
  </div>
</nav>
  <div class="container">
    <form method="POST">
      <h2>Profil</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="Login">login</label>
            <input type="text" class="form-control" placeholder="login" id="last" name="login">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="Prenom">Prenom</label>
            <input type="text" class="form-control" placeholder="prenom" name="prenom" id="first">
          </div>
        </div>
        <!--  col-md-6   -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" placeholder="nom" id="last" name="nom">
          </div>
        </div>
        <!--  col-md-6   -->
      </div>


      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" placeholder="password" id="company" name="password">
          </div>


        </div>
        <!--  col-md-6   -->

        <div class="col-md-6">

          <div class="form-group">
            <label for="password">confirm password</label>
            <input type="password" class="form-control" id="phone" placeholder="password confirm" name="repassword">
          </div>
        </div>
        <!--  col-md-6   -->
      </div>
      <!--  row   -->


      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
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

</html>