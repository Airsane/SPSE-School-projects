<?php

class Pizza implements Iterator {
	private $zaklad;
	private $prisady = array();
	
	public function __construct($zaklad, array $prisady)
	{
		$this->zaklad = $zaklad;
		$this->prisady = $prisady;
	}

	public function __get(string $name)
	{
		if ($name === "zaklad")
			return $this->zaklad;
	}

    private $indexPole = 0;
    // metoda vrací aktuální prvek z kolekce
    public function current () : string
    {
        return $this->prisady[$this->indexPole];
    }
    // metoda vrací klíč aktuálního prvku
    public function key () : int
    {
        return $this->indexPole;
    }
    // metoda přesune ukazatel na další prvek v kolekci
    public function next ()
    {
        $this->indexPole++;
    }
    // metoda přesune ukazatel na začátek kolekce
    public function rewind ()
    {
        $this->indexPole = 0;
    }
    // metoda zjistí, jestli ukazatel ukazuje na platný prvek
    public function valid () : bool
    {
        return isset($this->prisady[$this->indexPole]);
    }
}

?>