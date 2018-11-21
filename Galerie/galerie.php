<?php

class Galerie
{
    private $slozka;
    private $slozky;
    private $soubory = array();

    public function __construct($slozka)
    {
        $this->slozka = $slozka;    
    }

    public function load()
    {
        loadFolders();
    }

    private function loadFolders()
    {
        foreach ($this->$slozka as $slozka) {
            if (is_dir($slozka) && $slozka != '.' && $slozka != '..') {
                $this->slozky[] = $slozka;
            }
        }
    }

    function getFilesFromFolder($folder)
    {
        $temp = scandir($folder);
        $soubory = array();
        foreach ($temp as $soubor) {
            if (!is_dir($soubor) && $soubor != "thumbs") {
                $soubory[] = $soubor;
            }
        }
        generateImages($folder, $soubory);
    }

    private function loadFiles($folder)
    {
        $folder = scandir($folder);
        $soubory = array();
        foreach($folder as $soubor)
        {

        }
    }
}


?>