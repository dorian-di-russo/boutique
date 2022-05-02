<?
require 'dbhclass.php';


class panier {

    var $data;


    public function addpanier() {


        // if(isset($_POST["panier"] && ))



    }

    public function pagination ($values,$per_page){
        $total_values = count($values);

        if(isset($_GET["page"])){
            $current_page = $_GET["page"];

        }

        else {
            $current_page = 1;
        }

        $counts = ceil($total_values / $per_page);
        $param1 = ($current_page - 1 ) * $per_page;

        $this->data = array_slice($values, $param1,$per_page);

        for ($i = 0; $i < $counts; $i) {
            
        }




    }


}



?>