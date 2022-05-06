<?php
session_start();

require 'classes/adminclass.php';
if(!$_SESSION === true)
{
    header ('location: index.php');
}

?>

<link rel="stylesheet" href="template.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag  ---------->



<nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarsExample02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> </li>
      <li class="nav-item"> <a class="nav-link" href="#">Link</a> </li>
    </ul>
    <form class="form-inline my-2 my-md-0"> </form>
  </div>
</nav>
<div id="wrapper" class="toggled">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    
    <ul class="sidebar-nav">
      <li class="sidebar-brand"> <a href="#"> Start Bootstrap </a> </li>
      <li> <a href="#">Dashboard</a> </li>
      <li> <a href="#">Shortcuts</a> </li>
      <li> <a href="#">Overview</a> </li>
      <li> <a href="#">Events</a> </li>
      <li> <a href="#">About</a> </li>
      <li> <a href="#">Services</a> </li>
      <li> <a href="#">Contact</a> </li>
    </ul>
  </div> <!-- /#sidebar-wrapper -->
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="container-fluid">
      <h1>Simple Sidebar</h1>
      <form action="" method="post">
  <div class="form-group">
    
        <label for="id_category">Categories</label>
        <input class="form-control" type="number" name="id_categorie"><br>
        </div>
        <div class="form-group">
        <label class="form-label" for="Categories">Choisir une catégorie :</label>
        <input class="form-control" list="ice-cream-flavors" id="ice-cream-choice" name="nom" class="form-control" />

        <datalist id="datalistOptions">
          <option value="Action">
          <option value="Arcade">
          <option value="Combat">
          <option value="Fps">
          <option value="Sport">
          <option value="Stratégie">
          <option value="Aventure">
        
        </datalist>
        </div>

        <button type="submit" name="submit">Ajout catégorie</button>

  </div>

      </form>
      <?php


      if (isset($_POST['submit'])) {
        $id_categorie = $_POST['id_categorie'];
        $nom = $_POST['nom'];
        $categories = new Admin;
        $categories->addcategories($id_categorie, $nom);
      }

      $admin = new Admin;

      $admin->showdata();
      ?>
      <br>

      <form method="post">
        <label for="Login">id</label>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="login" id="last" name="id">
          <input type="submit" class="btn btn-primary" name='delate'>
        </div>
      </form>
      <br>
      <?php
      $admin->getAllcategories();
      if (isset($_POST['delate'])) {
        $id = $_POST['id'];



        $admin->delete($_POST['id']);
      }
      ?>
      <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
      <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
    </div>
  </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
<script>
  $(function() {
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $(window).resize(function(e) {
      if ($(window).width() <= 768) {
        $("#wrapper").removeClass("toggled");
      } else {
        $("#wrapper").addClass("toggled");
      }
    });
  });
</script>

</html>