<?
include_once "databaze.php";
$databaze = new Databaze();
if($_GET)
{
    $databaze->vymazZaznam($_GET['id']);
}
header("Location: index.php", true, 303);
exit;
?>