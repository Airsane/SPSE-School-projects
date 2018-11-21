<?

class Clovek{

    private $jmeno;
    private $prijmeni;
    private $pohlavi;
    private $datumnaroz;

    function __construct($jmeno,$prijmeni,$pohlavi,$datumnaroz)
    {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
        $this->pohlavi = $pohlavi;
        $this->datumnaroz = $datumnaroz;
    }

    public function __set($name, $value)
	{
		if ((property_exists($this, $name))) {
			$this->$name = $value;
			echo "Done" . $name;
		} else {
			throw new Exception("Špatná položka");
		}
	}

	public function __get($name)
	{
		echo $this->$name;
	}

}


?>