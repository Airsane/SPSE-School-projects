<?
require_once('./databaze.php');
$databaze = new Databaze();
$databaze->serviceDown();
header("Location: index.php", true, 303);
exit;

?>