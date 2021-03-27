<!DOCTYPE html>
<html lang="en">
<? include_once "Mobil.class.php";
include_once "databaze.php";
$databaze = new Databaze(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="vlozit.php" method="post"><input type="text" name="name" placeholder="název"><br>
        <input type="number" name="price" placeholder="cena"><br>
        <input type="number" name="size" placeholder="velikost" max="9" step="0.01"><br>
        <select name="color">
            <option value="black">Černá</option>
            <option value="red">Červená</option>
        </select><input type="submit" value="Odeslat"></form>
    <? $mobily = $databaze->getMobily();
        foreach ($mobily as $mobil) :
        ?>
    <div class="mobil">
        <hr>
        <span>Název:
            <?= $mobil->nazev ?>
        </span>
        <a href="./smaz.php?id=<?= $mobil->id?>"><span class="fas fa-trash"></span></a>
        <div>Cena:
            <?= $mobil->vypisCenu() ?>
        </div>
        <div>Velikost:
            <?= $mobil->velikost ?>''
        </div>
        <div>Barva:
            <?= $mobil->barva ?>
        </div>
        
    </div>
    <? endforeach  ?>
</body>

</html>