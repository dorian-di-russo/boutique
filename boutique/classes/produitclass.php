<?php
require 'classes/dbhclass.php';
class Produits extends dbh
{


   

    // public function readAll()
    // {




    //     $getprod = $this->connection->prepare("select  * FROM produits");
    //     $getprod->execute();



    //     while ($rows =  $getprod->fetchAll()) {

    //         $idr = 'id';
    //         $nomr = 'nom';
    //         $prixr = 'prix';
    //         $descriptionr = 'description';
    //         $nomr = 'quantite';
    //         $imager = 'image';



    //         if ($rows) {
    //             foreach ($rows as $row) {


    //                 echo "<div class='card' style='width: 18rem;'>
    //             <img class='card-img-top' src='images/$row[$imager]' alt='Card image cap'>
    //             <div class='card-body'>
    //               <h5 class='card-title'>$row[$nomr]</h5>
    //               <p class='card-text'>$row[$descriptionr]</p>
    //               <p class='card-text'>$row[$prixr]</p>

    //               <a href='addpanier.php?id=$row[$idr]' class='btn btn-primary'>Go somewhere</a>
    //             </div>
    //           </div>";

    //                 //  echo $row[$nomr].'<br>';
    //                 //  echo $row[$nomr].'<br>';
    //                 //  echo $row[$nomr].'<br>';
    //                 //  echo $row[$prixr];


    //                 // echo "<br>";
    //                 // echo "<tr><td>";


    //                 // echo "<td>Login: $user[$loginr]<br></td>";
    //                 // echo "<td>Email: $user[$emailr]<br></td>";
    //                 // echo "<td>Prenom: $user[$prenomr]<br></td>";
    //                 // echo "<td>Nom: $user[$nomr]<br></td>";
    //                 // echo "<td>Id: $user[$idr]<br></td>"; 


    //             }
    //             return $rows;
    //         } else {
    //             // Whatever your requirement is to handle the no user case, do it here.
    //             echo 'Pas de produit.';
    //         }
    //     }
    // }


    public function dataview($query)
    {
        $stmt = $this->connection->prepare($query);
        var_dump($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            
            $data = $stmt->fetchAll();
            return $data;

           
           
        }
    }


    public function pagination($query, $record_per_page)
    {

        $starting_position = 0; 
        if (isset($_GET["page_no"])) { 
            $starting_position =
                ($_GET["page_no"] - 1) * $record_per_page; // page 
        }
        $query2 = $query . " LIMIT $starting_position,$record_per_page ";
        return $query2;
    }




    public function paginglink($query, $records_per_page)
    {

        $self = $_SERVER['PHP_SELF']; //  est égal a 'boutique/produit.php?page_no=2'

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $total_no_of_records = $stmt->rowCount();

        if ($total_no_of_records > 0) {
            ?><tr>
                    <td colspan="3"><?php
                                    $total_no_of_pages = ceil($total_no_of_records / $records_per_page);
                                    $current_page = 1;
                                    if (isset($_GET["page_no"])) {   // 
                                        $current_page = $_GET["page_no"];
                                    }
                                    if ($current_page != 1) { // page précédente
                                        $previous = $current_page - 1;
                                        echo "<a href='" . $self . "?page_no=1'>First</a>&nbsp;&nbsp;";
                                        echo "<a href='" . $self . "?page_no=" . $previous . "'>Previous</a>&nbsp;&nbsp;";
                                    }
                                    for ($i = 1; $i <= $total_no_of_pages; $i++) { // boucle pour affichage du nombre de pages
                                        if ($i == $current_page) {
                                            echo "<strong><a href='" . $self . "?page_no=" . $i . "' style='color:red;text-decoration:none'>" . $i . "</a></strong>&nbsp;&nbsp;";
                                        } else {
                                            echo "<a href='" . $self . "?page_no=" . $i . "'>" . $i . "</a>&nbsp;&nbsp;";
                                        }
                                    }
                                    if ($current_page != $total_no_of_pages) { // page suivante
                                        $next = $current_page + 1;
                                        echo "<a href='" . $self . "?page_no=" . $next . "'>Next</a>&nbsp;&nbsp;";
                                        echo "<a href='" . $self . "?page_no=" . $total_no_of_pages . "'>Last</a>&nbsp;&nbsp;";
                                    }
                                    ?></td>
                </tr><?php
                    }
                }





                public function Add($nom, $description, $prix, $id_categorie, $quantite, $image)
                {
                    // Gestion fichier image png


                    // gestion des erreurs du formulaire



                    $errors = array();




                    if(strlen($description) > 255) {
                        echo 'description trop longue';
                    }


                    $sql = 'SELECT nom FROM produits where nom = ? ';

                    $query = $this->connection->prepare($sql);

                    $query->execute([$nom]);

                    $noms = $query->FetchAll();


                    if (count($noms) > 0) {

                        $errors[] = 'Produit déja existant';
                    }

                    // if(!is_int($quantite)) {
                    //     $errors[] = 'Entrez un nombre';
                    // }


                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo $error . '<br><br>';
                        }
                    } else {

                        if (!empty($_FILES)) {


                            $file_names = $_FILES['fichier']['name'];

                            $file_type = strrchr($file_names, ".");


                            $files_destination = 'images/' . $file_names;
                            $files_tmpname = $_FILES['fichier']['tmp_name'];
                            $extension_autorisees =  array('.jpeg', '.pnj', '.png', '.jpg','.webp');





                            if (in_array($file_type, $extension_autorisees)) {

                                if (move_uploaded_file($files_tmpname, $files_destination)) {
                                    echo 'l image ne peux être ajoutée';
                                }
                            } else {
                                echo 'seuls les fichiers jpeg,pnj,png,jpg sont autorisé';
                            }
                        }


                        //    $sql  = 'INSERT INTO produits (nom,description,prix,id_categorie,quantite,image) VALUES (:nom,:description,:prix,:id_categorie,:quantité,:image);'; 

                        $sql = 'INSERT INTO `produits`( `nom`, `description`, `prix`, `id_categorie`, `quantite`, `image`) VALUES (:nom,:description,:prix,:id_categorie,:quantite,:image)';
                        $query = $this->connection->prepare($sql);

                        $query->execute(array(
                            'nom' => $nom,
                            'description' => $description,
                            'prix' => $prix,
                            'id_categorie' => $id_categorie,
                            'quantite' => $quantite,
                            'image' => $image
                        ));






                        echo 'Produit ajouté';
                    }
                }
            }
