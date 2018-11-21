<?php
abstract class Vozidlo
{
	private $rokVyroby;
	private $kapacita;
	private $evCislo;

	private static $posledniCislo = 0;
	
	public function __construct()
	{
		$this->evCislo = ++self::$posledniCislo;
	}
	
	public function setRokVyroby(int $hodnota)
	{
		if (is_int($hodnota) && $hodnota > 1997)
			$this->rokVyroby = $hodnota;
	}
	public function getRokVyroby()
	{
		return $this->rokVyroby;
	}
	
	public function setKapacita($hodnota)
	{
		if (is_int($hodnota) && $hodnota > 0)
			$this->kapacita = $hodnota;
	}
	public function getKapacita()
	{
		return $this->kapacita;
	}
	
	public function getEvidencniCislo()
	{
		return $this->evCislo;
	}
}
?>