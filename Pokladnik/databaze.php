<?
$max = 29;
$middle = 15;
class Databaze extends PDO
{
    function __construct($file = "databaze.ini")
    {
        if (!$settings = parse_ini_file($file, true)) throw new exception('Unable to open ' . $file . '.');
        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] . ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }


    public function addUser(string $first, string $sur, int $group)
    {
        try {
            $shortcut = strtolower(substr(bezDiakritiky($sur), 0, 6) . substr(bezDiakritiky($first), 0, 2));
            $query = parent::prepare("INSERT INTO studenti (jmeno,prijmeni,prezdivka,skupina) VALUES (?,?,?,?)");
            $query->execute(array($first, $sur, $shortcut, $group));
            echo ("done");
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
    }

    public function getUsers() : array
    {
        $query = parent::prepare("SELECT * FROM studenti");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function getUsersByGroup(int $skupina) : array
    {
        $query = parent::prepare("SELECT *,if(idstudenti in (SELECT studentId FROM `sluzba`), 1,0) AS sluzba FROM studenti WHERE idstudenti NOT in (SELECT * from vyjimky) and skupina = ?");
        $query->execute(array($skupina));
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function getUser(int $id) : array
    {
        $query = parent::prepare("SELECT * FROM studenti where idstudenti = ?");
        $query->execute(array($id));
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function getService() : array
    {
        $query = parent::prepare("SELECT * FROM sluzba");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function getSluzbaId()
    {
        $query = parent::prepare("SELECT * FROM `studentisluzba` GROUP BY skupina");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($res as $re) {
            if ($re->skupina == 1) {
                $re->idstudenti++;
                if ($re->idstudenti == 15)
                    $re->idstudenti = 1;
            } else {
                $re->idstudenti--;
                if ($re->idstudenti == 15)
                    $re->idstudenti = 29;
            }

        }
        return $res;
    }

    public function getSluzbaIdmin()
    {
        $query = parent::prepare("SELECT * FROM `studentisluzba` GROUP BY skupina");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($res as $re) {
            if ($re->skupina == 1) {
                $re->idstudenti--;
                if ($re->idstudenti == 0)
                    $re->idstudenti = 14;
            } else {
                $re->idstudenti++;
                if ($re->idstudenti == 30)
                    $re->idstudenti = 16;
            }

        }
        return $res;
    }

    public function serviceUp()
    {
        $res = $this::getSluzbaId();
        $query = parent::prepare("DELETE FROM sluzba");
        $query->execute();
        $query = parent::prepare("INSERT INTO sluzba (studentId,datum) VALUES (if(? not IN(SELECT * FROM vyjimky),?,?+1),NOW())");
        $query->execute(array($res[0]->idstudenti, $res[0]->idstudenti, $res[0]->idstudenti));
        $query = parent::prepare("INSERT INTO sluzba (studentId,datum) VALUES (if(? not IN(SELECT * FROM vyjimky),?,?-1))");
        $query->execute(array($res[1]->idstudenti, $res[1]->idstudenti, $res[1]->idstudenti));
        return $res;
    }
    public function serviceDown()
    {
        $res = $this::getSluzbaIdmin();
        $query = parent::prepare("DELETE FROM sluzba");
        $query->execute();
        $query = parent::prepare("INSERT INTO sluzba (studentId,datum) VALUES (if(? not IN(SELECT * FROM vyjimky),?,?-1),NOW())");
        $query->execute(array($res[0]->idstudenti, $res[0]->idstudenti, $res[0]->idstudenti));
        $query = parent::prepare("INSERT INTO sluzba (studentId,datum) VALUES (if(? not IN(SELECT * FROM vyjimky),?,?+1),NOW())");
        $query->execute(array($res[1]->idstudenti, $res[1]->idstudenti, $res[1]->idstudenti));
    }

    private function bezDiakritiky($text)
    {
        $text = iconv("UTF-8", "ASCII//TRANSLIT", $text);
        $text = str_replace("'", "", $text);
        return $text;
    }
}


?>