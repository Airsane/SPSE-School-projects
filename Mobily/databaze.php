    <?
    include_once "Mobil.class.php";
    class Databaze extends PDO
    {
        function __construct($file = "databaze.ini")
        {
            //$this->spojeni = new PDO("mysq:dbname=$this->databaze;")
            if (!$settings = parse_ini_file($file, true)) throw new exception('Nepovedlo se otevřít soubor ' . $file . '.');
            $dns = $settings['database']['driver'] .
                ':host=' . $settings['database']['host'] . ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
                ';dbname=' . $settings['database']['schema'] . ';charset=utf8mb4';

            parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
        }

        public function vlozMobil($objekt)
        {
            $sql = "INSERT INTO mobily (nazev,cena,velikost,barva) VALUES (:nazev,:cena,:velikost,:barva)";
            $query = parent::prepare($sql);
            $query->bindParam(":nazev", $objekt->nazev);
            $query->bindParam(":cena", $objekt->cena);
            $query->bindParam(":velikost", $objekt->velikost);
            $query->bindParam(":barva", $objekt->barva);
            return $query->execute();
        }

        public function vymazZaznam($id)
        {
            $sql = 'DELETE FROM mobily WHERE id = :id';
            $query = parent::prepare($sql);
            $query->bindParam(":id", $id);
            return $query->execute();
        }

        /*public function getMobily()
        {
            $sql = "SELECT * FROM mobily";
            $query = parent::prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }*/

        public function getMobily()
        {
            $sql = "SELECT * FROM mobily";
            $query = parent::prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, 'Mobil');
        }

    }


    ?>