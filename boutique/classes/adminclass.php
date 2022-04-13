<?php
require 'dbhclass.php';

    Class admin extends dbh

    {

        public function __construct()
        {

        }



        public function adminuser()
        {
            
        }


        public function delateData($id,$table){


            $sql ="DELATE FROM $table where id=:id";

            $q = $this->connection->prepare($sql);
            $q->execute(array(':id'=>$id));
            return true;

        


        }


        public function showdata($table){
            $sql = "SELECT * FROM $table";

            $stmt =  $this->connection->prepare($sql);
            $stmt->execute();
            while ($r = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $data[] = $r;
                return $data;
            }
        }



        public function getbyid($id,$table){
            $sql = "SELECT * FROM $table WHERE id=:id";
            $q =$this->connection->prepare($sql);
            $q->execute(array(':id'=>$id));
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return $data;
            
        }




    }



    




?>