<?
spl_autoload_register(function ($className){
    require_once("{$className}.php");
});

session_start();
if($_POST)
{
    $pizza = new Pizza($_POST['zaklad'],$_POST['surovina']);
    var_dump($pizza->zaklad);
    $_SESSION['kosik']->vlozitPolozku($pizza);   
}
header("Location: index.php", true, 303);
exit;

?>