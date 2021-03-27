<?
require_once('./databaze.php');
$databaze = new Databaze();
var_dump($databaze->serviceUp());
//header("Location: index.php", true, 303);
//exit;

?>