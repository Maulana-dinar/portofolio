<?php

class Database {

    private $connection;

    public function getConnection(){

        $this->connection = mysqli_connect(

            "localhost",
            "root",
            "",
            "db_portofolio"
        );

        if(!$this->connection){

            die(
                "Koneksi gagal : " .
                mysqli_connect_error()
            );
        }

        return $this->connection;
    }
}
?>