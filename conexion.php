<?php

class CConexion {
    public function ConexionBD() {
        $host = "localhost";
        $dbname = "CRETA";
        $username = "postgres";
        $password = "1071";
    
        try {
            $conn = new PDO("pgsql:host=$host;dbname=$dbname;", $username, $password);
        } catch (PDOException $exp) {
            echo "no conecto $exp";
        }

        return $conn;
    }
}


?>