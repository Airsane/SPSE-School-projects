<?php

include_once "Mobil.class.php";
include_once "databaze.php";
$databaze = new Databaze();
if ($_POST) {
    $mobil = new Mobil();
    $mobil->nastavHodnoty($_POST['name'], $_POST['price'], $_POST['size'], $_POST['color']);
    if($databaze->vlozMobil($mobil)){
        
    }
}
header("Location: index.php", true, 303);
exit;
?>