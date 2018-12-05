<!DOCTYPE html>
<?
    spl_autoload_register(function ($className){
    require_once("{$className}.php");
    });
    session_start();
    if(!isset($_SESSION['kosik']))
        $_SESSION['kosik'] = new Kosik();
    
    echo $_SESSION['kosik']->key();
    
    
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <??>
</head>

<body>
    <div>
        <a href="vypis.php">V košíku je aktuálně
            <?=$_SESSION['kosik']->count()?> položek</a>
        <form action="vlozit.php" method="post">
            <select name="zaklad" id="">
                <option value="0">rajčatový</option>
                <option value="1">smetanový</option>
            </select><br>
            <input type="checkbox" name="surovina[]" value="0">sýr<br>
            <input type="checkbox" name="surovina[]" value="1">šunka<br>
            <input type="checkbox" name="surovina[]" value="2">zampiony<br>
            <input type="checkbox" name="surovina[]" value="3">slanina<br>
            <input type="checkbox" name="surovina[]" value="4">špenát<br>
            <input type="checkbox" name="surovina[]" value="5">mozzarella<br>
            <input type="checkbox" name="surovina[]" value="6">tuňák<br>
            <input type="checkbox" name="surovina[]" value="7">olivy<br>
            <input type="checkbox" name="surovina[]" value="8">kukuřice<br>
            <input type="checkbox" name="surovina[]" value="9">ananas<br>
            <input type="submit" value="Vložit do košíku">
        </form>

    </div>
</body>

</html>