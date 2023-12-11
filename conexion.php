<?php
class CConexion {
    private static $conn; // Variable estática para almacenar la conexión

    public static function ConexionBD() {
        if (!isset(self::$conn)) {
            $host = "localhost";
            $dbname = "CRETA";
            $username = "postgres";
            $password = "1071";

            try {
                self::$conn = new PDO("pgsql:host=$host;dbname=$dbname;", $username, $password);
                // Lanzar una excepción en caso de error
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exp) {
                throw new Exception("Error de conexión: " . $exp->getMessage());
            }
            try {
                // ...
            } catch (PDOException $exp) {
                echo "Error de conexión: " . $exp->getMessage();
            } catch (Exception $e) {
                echo "Excepción general: " . $e->getMessage();
            }
            
        }

        return self::$conn;
    }
}

?>