<?php
session_start();
var_dump($_SESSION);

@$prenom = $_POST['prenom'];
@$nom = $_POST['nom'];
@$password = $_POST['password'];
@$repassword = $_POST['repassword'];
@$email = $_POST['email'];
@$id_droits = $_POST['id_droits'];


if(isset($_POST['logout'])){
  session_destroy();
}



?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Inscription</title>
</head>

<?php 



?>
<body>
<div class="container">
  <form action=""  method="POST">
    <h2>Inscription</h2>
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
          <input type="email" class="form-control" id="email" placeholder="email" name ="email">
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
    <button type="submit" class="btn btn-primary" name="logout">log</button><br>
    </div>
  </form>
</div>
</body>

</html>

