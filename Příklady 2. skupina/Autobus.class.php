<?
require_once("Vozidlo.class.php");

class Autobus extends Vozidlo
{
	private $regZnacka;

	public function setRegistracniZnacka($hodnota)
	{
		$this->regZnacka = $hodnota;
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

	public function getRegistracniZnacka()
	{
		return $this->regZnacka;
	}
}
?>