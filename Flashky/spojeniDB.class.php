<?

class spojeniDB extends PDO
{

    function __construct($username = "root", $password = "")
    {
        parent::__construct('mysql:host=127.0.0.1;dbname=flashky;charset=utf8', $username, $password);
    }

    public function vlozitFlashku($flashka)
    {
        $sql = "INSERT INTO flashky (nazev,cena,velikost) VALUES (:nazev,:cena,:velikost)";
        $query = parent::prepare($sql);
        $query->bindParam(":nazev", $flashka->nazev);
        $query->bindParam(":cena", $flashka->cena);
        $query->bindParam(":velikost", $flashka->velikost);
        return $query->execute();
    }

    public function getFlashky()
    {
        $sql = "SELECT * FROM flashky";
        $query = parent::prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Flashka');
    }

    public function vymazZaznam($id)
    {
        $sql = 'DELETE FROM flashky WHERE id = :id';
        $query = parent::prepare($sql);
        $query->bindParam(":id", $id);
        return $query->execute();
    }
}

?>