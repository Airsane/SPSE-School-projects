<?

require('./mobil.php');
if($_POST)
{
    $mobil = new Mobil($_POST['name'],$_POST['price'],$_POST['state'],$_POST['description']);
}

$state = [0=>"Nový",1=>"Použitý"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
    Název: <input type="text" name="name"><br>
    Cena: <input type="number" name="price"><br>
    Stav: <input type="radio" name="state" value="0"> Nový <input type="radio" name="state" value="1"> Použitý<br>
    Popis: <textarea name="description" id="" cols="30" rows="10"></textarea> <br>
    <input type="submit" value="Odeslat">
    </form>
    <? if(isset($mobil)) : ?>
        <div class="mobil">
        Název: <?=$mobil->getName()?><br>
        Cena: <?=$mobil->getPrice()?><br>
        Stav: <?=$state[$mobil->getState()]?><br>
        Popis: <?=$mobil->getDescription()?>
        </div>
    <? endif?>
</body>
</html>