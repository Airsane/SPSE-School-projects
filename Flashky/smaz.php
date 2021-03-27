<?
require_once('spojeniDB.class.php');
$databaze = new spojeniDB();
session_start();

if ($_GET) {
    if ($databaze->vymazZaznam($_GET['id'])) {
        $_SESSION['succ'] = "Záznam byl vymazán!";
    } else {
        $_SESSION['err'] = "Záznam nebyl vymazán!";
    }
}
header("Location: index.php", true, 303);
exit;
?>