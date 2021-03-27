<?

class Clovek
{

    public $id;
    public $jmeno;
    public $prijmeni;
    public $datumNarozeni;
    public $pohlavi;

    function __construct()
    { }

    public function nastavHodnoty($jmeno, $prijmeni, $datumNarozeni, $pohlavi, $id = "")
    {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
        $this->datumNarozeni = $datumNarozeni;
        $this->pohlavi = $pohlavi;
        $this->id = $id;
    }
}
