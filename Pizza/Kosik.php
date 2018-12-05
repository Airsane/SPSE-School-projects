<?php

require('Pizza.class.php');

class Kosik implements Iterator{
    private $obsah = array();
    private $position = 0;

    public function __constructor(){
        $this->position = 0;
    }

    public function vlozitPolozku(Pizza $item){
        $this->obsah[] = $item;
    }

    public function odebatPolozku(int $polozka){
        array_splice($this->obsah,$polozka,1);
    }
    
    public function vybratPolozku(int $i){
        return $this->obsah[$i];
    }

    public function count()
    {
        return count($this->obsah);
    }

    // metoda vrací aktuální prvek z kolekce
    public function current () : Pizza
    {
        return $this->obsah[$this->position];
    }
    // metoda vrací klíč aktuálního prvku
    public function key () : int
    {
        return $this->position;
    }
    // metoda přesune ukazatel na další prvek v kolekci
    public function next ()
    {
        $this->obsah++;
    }
    // metoda přesune ukazatel na začátek kolekce
    public function rewind ()
    {
        $this->obsah = 0;
    }
    // metoda zjistí, jestli ukazatel ukazuje na platný prvek
    public function valid () : bool
    {
        return isset($this->obsah[$this->position]);
    }
}

?>