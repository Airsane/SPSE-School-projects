<?

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

    public function vlozCloveka($objekt)
    {
        $sql = "INSERT INTO lide (jmeno,prijmeni,datumNarozeni,pohlavi) VALUES (:jmeno,:prijmeni,:datumNarozeni,:pohlavi)";
        $query = parent::prepare($sql);
        $query->bindParam(":jmeno", $objekt->jmeno);
        $query->bindParam(":prijmeni", $objekt->prijmeni);
        $query->bindParam(":datumNarozeni", $objekt->datumNarozeni);
        $query->bindParam(":pohlavi", $objekt->pohlavi);
        $query->execute();
    }

    public function getLidi()
    {
        $sql = "SELECT * FROM lide";
        $query = parent::prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}


