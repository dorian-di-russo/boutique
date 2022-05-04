<?php


class Admin

{
    public $nom;
    public $prix;
    public $description;
    public $id_categorie;
    public $quantite;
    public $image;
    public $table_name = "categories";






    public function __construct(
        $dbhost = "localhost",
        $dbname = "boutique",
        $username = "root",
        $password    = ""
    ) { {


            try {
                $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }



    





   


    public function   setRoleUser()
    {
    }


    public function addcategories($id_categorie, $nom)
    {


        $sql = "INSERT INTO categories(nom,id_categorie) VALUES (:nom, :id_categorie)";
        $query = $this->connection->prepare($sql);
        $query->execute(
            [
                'nom' => $nom, 'id_categorie' => $id_categorie
            ]
        );
    }


   






    public function delateData($id, $table)
    {



        $sql = "DELATE FROM $table where id=:id";

        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));
        return true;
    }


    public function showdata()
    {
        $getusers = $this->connection->prepare("select  * FROM utilisateurs");
        $getusers->execute();
        $users = $getusers->fetchAll();
        $loginr = 'login';
        $emailr = 'email';
        $prenomr = 'prenom';
        $nomr = 'nom';
        $idr = 'id';


        echo "<table class='table table-dark'>";
        if ($users) {
            foreach ($users as $user) {
                echo "<br>";
                echo "<tr><td>";


                echo "<td>Login: $user[$loginr]<br></td>";
                echo "<td>Email: $user[$emailr]<br></td>";
                echo "<td>Prenom: $user[$prenomr]<br></td>";
                echo "<td>Nom: $user[$nomr]<br></td>";
                echo "<td>Id: $user[$idr]<br></td>"; 


                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Whatever your requirement is to handle the no user case, do it here.
            echo 'Error: No users.';
        }
    }



    public function getbyid($id, $table)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }



    public function getAllcategories()
    {
        // $sql = 'SELECT * FROM categories order by nom asc';
        // $query = $this->connection->query($sql);
        // $categories = $query->fetchAll();
        // return $categories;

        $getCategories = $this->connection->prepare("select  * FROM categories ORDER BY nom asc");
        $getCategories->execute();
        $categories = $getCategories->fetchAll();
        $idr = 'id';
        $id_categorie = 'id_categorie';

        $nomr = 'nom';


        echo "<table class='table table-dark'>";
        if ($categories) {
            foreach ($categories as $categorie) {
                echo "<br>";
                echo "<tr><td>";



                echo "<td>Id categorie: $categorie[$id_categorie]<br></td>";
                echo "<td>id : $categorie[$idr]<br></td>";
                echo "<td>Nom: $categorie[$nomr]<br></td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Whatever your requirement is to handle the no user case, do it here.
            echo 'Erreur : pas de catégories.';
        }
    }


    public function getAllProd()
    {
        // $sql = 'SELECT * FROM categories order by nom asc';
        // $query = $this->connection->query($sql);
        // $categories = $query->fetchAll();
        // return $categories;

        $getProd = $this->connection->prepare("select  * FROM produits ORDER BY nom asc");
        $getProd->execute();
        $categories = $getProd->fetchAll();
        $idr = 'id';
        $id_categorie = 'id_categorie';
        $nomr = 'nom';



        echo "<table class='table table-dark'>";
        if ($categories) {
            foreach ($categories as $categorie) {
                echo "<br>";
                echo "<tr><td>";



                echo "<td>Id categorie: $categorie[$id_categorie]<br></td>";
                echo "<td>id : $categorie[$idr]<br></td>";
                echo "<td>Nom: $categorie[$nomr]<br></td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Whatever your requirement is to handle the no user case, do it here.
            echo 'Erreur : pas de catégories.';
        }
    }



    public function delete($id = null, $table = 'utilisateurs')
    {


        if ($this->connection != null) {
            if ($id !== null) {
                $query_string = sprintf("DELATE FROM {$table} WHERE id ={$id}");

                $result = $this->connection->query($query_string);
                if ($result) {
                    echo 'Profil supprimé';
                }
            }
        }



        // $sql = "DELETE FROM utilisateurs where id=:id";
        // $query= $this->connection->prepare($sql);
        // $query->execute(array(':id'=>$id));
        // if ($query->rowCount() >0){
        //     echo 'profil supprimé';
        // }








    }
}
