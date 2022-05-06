<?php

class Panier {

    private $db;

    public function __construct($db){

        if(!isset($_SESSION)){
             session_start();   // démarrage de session automatique
        }

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array(); // création d'une session panier
        }
        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']); // 
        }



        $this->db = $db;





    }

    

    



    // public function checkout($products,$nom,$description,$prix){

    //     foreach($products as $product){

    //     $sql = 'INSERT INTO `produits`( `nom`, `description`, `prix`, ) VALUES (:nom,:description,:prix)';
    //                     $query = $this->db->prepare($sql);

    //                     $query->execute(array(
    //                         'nom' => $nom,
    //                         'description' => $description,
    //                         'prix' => $prix
    //                     ));

    //                 }

    // }
    

    public function sum(){

        return array_sum($_SESSION['panier']);
    }

    public function total (){
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
                    if (empty($ids)) {
                        $products = array();
                    } else {

                        $products = $this->db->request('SELECT id,prix FROM produits WHERE id IN (' . implode(',', $ids) . ')');
                    }
                    foreach($products as $product){

                        $total += $product->prix * $_SESSION['panier'][$product->id];

                    }

                    return $total;
    }


    public function add ($product_id){


        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++; // incrémentation pour gérer quantité 
        }else{

            $_SESSION['panier'][$product_id] = 1;
        }


    }


    public function del($product_id){
        var_dump($product_id);
        unset($_SESSION['panier'][$product_id]); // retirer objet du panier
    }

}
