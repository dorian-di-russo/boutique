<?php

Class dbh
{
    public function __construct(
        $dbhost = "localhost",
        $dbname = "boutique",
        $username = "root",
        $password    = ""
    ) { {


            try {
                $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND ,'SET NAMES UTF8');

                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }




    
}
