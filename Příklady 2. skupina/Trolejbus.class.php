<?
require_once("Vozidlo.class.php");
require_once("Letajici.interface.php");

class Trolejbus extends Vozidlo implements ILetajici
{
	private $napajeni;
	
	public function getEvidencniCislo()
	// prekryta metoda predka, upravuje chovani
	{
		return 100 + parent::getEvidencniCislo();
	}
	
	public function setNapajeni($hodnota)
	{
		$this->napajeni = $hodnota;
	}
	public function getNapajeni()
	{
		return $this->napajeni;
	}

	// implementace metod z rozhrani	
	public function let()
	{
		echo "Ja letim :)";
		// tohle je tu jenom pro zjednoduseni ukazky...
		// obecne by metody ve tride nemely vubec resit vypisovani,
		// protoze vypis zavisi na strukture stranky a na ni by mela byt trida nezavisla
		// metody ve tride maji jen poskytovat hodnoty, jako metody getXXX vyse
	}
}
?>