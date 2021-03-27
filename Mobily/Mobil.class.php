<?

class Mobil
{

    public $id;
    public $nazev;
    public $cena;
    public $velikost;
    public $barva;

    function __construct()
    {
    }

    public function nastavHodnoty($nazev, $cena, $velikost, $barva, $id = "")
    {
        $this->nazev = $nazev;
        $this->cena = $cena;
        $this->velikost = $velikost;
        $this->barva = $barva;
        $this->id = $id;
    }

    public function vypis()
    { echo"<div class='mobil'><hr><div>Název:<?= $mobil->nazev ?></div><div>Cena:<?= $mobil->cena ?> Kč</div><div>Velikost:<?= $mobil->velikost ?>''</div><div>Barva:<?= $mobil->barva ?></div></div>";
    }

    public function __toString()
    {
        return "$this->nazev $this->cena $this->velikost $this->barva";
    }

    public function vypisCenu(){
        //zformátuje cenu - oddělené tisíce a doplněné kč
        /*$tisice = floor($this->cena/1000);
        $zbytek = $this->cena % 1000;
        return $tisice.'&nbsp;'.$zbytek.'&nbsp;Kč';*/
        return number_format($this->cena,0,"."," ")."&nbsp;Kč";
    }

}


?>