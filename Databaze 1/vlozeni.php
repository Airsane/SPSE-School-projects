<?php

include_once "clovek.php";
include_once "databaze.php";
$databaze = new Databaze();
if ($_POST) {
    $zak = new Clovek();
    $zak->nastavHodnoty($_POST['jmeno'], $_POST['prijmeni'], $_POST['datumNarozeni'], $_POST['pohlavi']);
    $databaze->vlozCloveka($zak);
    var_dump($zak);
}
header("Location: index.php", true, 303);
exit;
?>