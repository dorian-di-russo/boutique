<?php
session_start();
require 'classes/signupclass.php';

$user = new register;
if($user->is_loggedin()!="")
{
 
}

if(isset($_POST['log']))
{
 $login = $_POST['login'];
 $email = $_POST['email'];
 $password = $_POST['password'];
  
 if($user->userlog($login,$email,$password))
 {
  $user->redirect('profil.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Portail de Login</h1>
    </header>
    <main>
        
        <form id="login_form" class="form_class" action="" method="post">
            <div class="form_div">
           
                <label>Login:</label>
                <input class="field_class" name="login" type="text" placeholder="Entrez votre login" autofocus>
                <label>Email:</label>
                <input class="field_class" name="email" type="text" placeholder="Entrez votre email" >
                <label>Password:</label>
                <input id="pass" class="field_class" name="password" type="password" placeholder="Entrez votre mot de passe">

                <?php
            

?>
                <button class="submit_class" type="submit" form="login_form" name ='log'>Entrer</button><br>
                <a href="logout.php?logout=true"><button class="submit_class" name='logout' type="submit" >déconnexion</button></a>
            </div>
            <div class="info_div">
                <p>Vous n'êtes pas enregistré <a href="inscription.php">Inscrivez-vous !</a></p>
            </div>
        </form>
    </main>
    <footer>
        <p>Développé par <a href="#">Dorian&trade;</a></p>
    </footer>


</body>
</html>

<?php


?>
