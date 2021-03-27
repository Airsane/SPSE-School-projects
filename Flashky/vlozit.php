<?
require_once('spojeniDB.class.php');
require_once('Flashka.class.php');
session_start();

if ($_POST) {
    if (empty($_POST['nazev']) || empty($_POST['cena']) || empty($_POST['velikost'])) {
        $_SESSION['err'] = "Nebyly vyplněny všechny hodnoty!";
        header("Location: index.php", true, 303);
        exit;
    }

    $flash = new Flashka();
    $flash->nastavHodnoty($_POST['nazev'],$_POST['cena'],$_POST['velikost']);
    $databaze = new spojeniDB();
    if($databaze->vlozitFlashku($flash)){
        $_SESSION['succ'] = "Záznam vložen!";
    }
    else{
        $_SESSION['err'] = "Záznam nebyl vložen!";
    }
    

}

header("Location: index.php", true, 303);
exit;
?>