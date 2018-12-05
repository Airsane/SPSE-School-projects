<?php

class Pizza {
    private $zaklad;
    private $suroviny = array();

    public function __construct($zaklad, array $suroviny){
        $this->zaklad = $zaklad;
		$this->suroviny = $suroviny;
    }

    public function __set($name, $value)
	{
		if ((property_exists($this, $name))) {
			$this->$name = $value;
		} else {
			throw new Exception("Špatná položka");
		}
	}

	public function __get($name)
	{
		return $this->$name;
	}
}

?>