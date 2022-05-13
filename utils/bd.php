<?php
    class BD{
        static $conn = NULL;
        static function obtine_conexiune(){
            if (is_null(BD::$conn)){
                include ("config.php");
                
                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

                // optiuni vizand maniera de conectare
                $opt = [
                    // erorile sunt raportate ca exceptii de tip PDOException
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    // rezultatele vor fi disponibile in tablouri asociative
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    // conexiunea e persistenta
                    PDO::ATTR_PERSISTENT 		 => TRUE
                ];
                try {
                    BD::$conn = new PDO ($dsn, $user, $pass, $opt);
                } catch (PDOException $e) {
                    echo "Eroare: " . $e->getMessage(); // mesajul exceptiei survenite
                    exit(0);
              };
            }
            return BD::$conn;
        }
    }

?>