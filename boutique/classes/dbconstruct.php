<?php
class Database
{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "boutique";
    private $username = "root";
    private $password = "";
    private $db;


    public function __construct($host = null, $db_name = null, $username = null, $password = null)
    {

        if ($host != null) {
            $this->host = $host;
            $this->db_name = $db_name;
            $this->username = $username;
            $this->password = $password;
        }


        try {
            $this->db = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $e) {
            echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
        }
    }

    public function request($sql, $data = array())
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
       return $req->fetchAll(PDO::FETCH_OBJ);
    }
    // get the database connection

}
