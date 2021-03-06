<?php
// BON
require_once File::build_path(array('config','Conf.php'));

class Model{
    public static $pdo;

        public static function Init()
        {
            $hostname = Conf::getHostname();
            $database_name = Conf::getDatabase();
            $login = Conf::getLogin();
            $password = Conf::getPassword();

            try
            {
                self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                if (Conf::getDebug()) 
                {
                    echo $e->getMessage(); // affiche un message d'erreur
                } 
                else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }


        public static function update($primary_key, $primary_value, $table_name, $data)
        {
            try
            {
                //var_dump($data);
                $sql = "UPDATE " . $table_name . " SET ";
                foreach ($data as $valeur => $key)
                {
                    $sql = $sql . $valeur . " = '" . $key . "', ";

                }
                $sql = rtrim($sql, ', ') . " WHERE " . $primary_key . " = '" . $primary_value ."'";
                //var_dump($sql);
                $req_prep = Model::$pdo->prepare($sql);
                $req_prep->execute($data);
            } catch(PDOException $e) {
                if (Conf::getDebug()) 
                {
                    echo $e->getMessage(); // affiche un message d'erreur
                } 
                else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
        }

// public function save() {
//         $table_name = static::$object;
//         $class_name = 'Model' . ucfirst($table_name);
//         $champs = "";
//         foreach ($this as $cle => $valeur){
//             $champs = $champs .':'.$cle.',';
//         }
//         try{
//             $sql = "INSERT INTO $table_name VALUES (".rtrim($champs, ',').")";
//             // Préparation de la requête
//             $req_prep = Model::$pdo->prepare($sql);
//
//             foreach ($this as $cle => $valeur){
//                 $values[$cle] = $valeur;
//         }
//         // On donne les valeurs et on exécute la requête
//         $req_prep->execute($values);
//         } catch(PDOException $e) {
//             if (Conf::getDebug())
//                 echo $e->getMessage(); // affiche un message d'erreur
//             else
//                 echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
//             die();
//         }
//     }

static public function selectAll() {

        $table_name = static::$object;
        $class_name = 'Model' . ucfirst($table_name);
        $sql = 'SELECT * FROM '.ucfirst($table_name);


        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();

        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);


        $tab = $req_prep->fetchAll();
        return $tab;
    }

    static public function select($primary_value)
    {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst($table_name);
        $primary_key = static::$primary;

        $sql = "SELECT * from " . ucfirst($table_name) .  " WHERE " . $primary_key . " = '" . $primary_value. "'";
        //var_dump($sql);
        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();

        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false

        if (empty($tab))
        {
            return false;
        }
            return $tab[0];
    }

     static public function delete($primary_value) {

        $table_name = static::$object;
        $class_name = 'Model' . ucfirst($table_name);
        $primary_key = static::$primary;
        $sql = "DELETE from " . ucfirst($table_name) .  " WHERE " . $primary_key . " = '" . $primary_value. "'";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();
    }

    static public function countAll()
    {
        $table_name = static::$object;
        $class_name = 'Model' . ucfirst($table_name);
        $sql = 'SELECT COUNT(*) FROM '.ucfirst($table_name);
        // var_dump($sql);
        $req_prep = Model::$pdo->prepare($sql);

        $req_prep->execute();

        $tab = $req_prep->fetchColumn();
        // var_dump($tab[0][0]);
        return (int)$tab;
    }
}
Model::Init();
?>
