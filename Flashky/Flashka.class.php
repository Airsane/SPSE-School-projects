<?

class Flashka
{
    public $nazev;
    public $cena;
    public $velikost;
    public $id;

    function __construct()
    {
    }

    public function nastavHodnoty(string $nazev, int $cena, int $velikost, $id = 0)
    {
        $this->nazev = $nazev;
        $this->cena = $cena;
        $this->velikost = $velikost;
        $this->id = $id;
    }

    private function formatCeny(){
        return number_format($this->cena, 0, ',', '&nbsp');
    }

    public function vypis()
    {
        $cena = $this->formatCeny();
        return"<div class='flashka'> <span class='nazev'><b>$this->nazev</b></span> <span class='velikost'>$this->velikost&nbspGB</span> <span><a href='smaz.php?id=$this->id'>delete</a></span> <div class='cena'>$cena&nbspKč</div></div>"; 
    }
}



?>