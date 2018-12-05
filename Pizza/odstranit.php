<?
spl_autoload_register(function ($className){
    require_once("{$className}.php");
});

session_start();

$_SESSION['kosik']->odebatPolozku($_GET['id']);
header("Location: vypis.php", true, 303);
?>