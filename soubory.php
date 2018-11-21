<?php
setlocale(LC_ALL, "cs_CZ.utf8");
class Slozky
{
    private $slozka;

    public function __construct($slozka)
    {
        $this->slozka = $slozka;
    }

    public function nacti()
    {
        $slozka = glob('*');
        $blacklist = ['.', '..', 'res'];
        foreach ($slozka as $soubor) {
            if (is_dir($soubor)) {
                if (!in_array($soubor, $blacklist))
                    $this->soubory[] = $soubor;

            }
        }
        usort($this->soubory, 'strcoll'); 
    }

    public function vypis()
    {
        foreach ($this->soubory as $soubor) {
            echo ('<a href="' . $soubor . '/index.php"><section>' . $soubor . '</section></a>');
        }
    }
}



?>