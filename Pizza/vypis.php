<?php
spl_autoload_register(function ($className){
    require_once("{$className}.php");
});
session_start();
$zaklad = ['rajčatový','smetanový'];
$suroviny = ['sýr','šunka','žampiony','slanina','špenát','mozzarella','tuňák','olivy','kukuřice','ananas'];
$kosik = $_SESSION['kosik'];
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
    <div>
    <? for($i = 0; $i < $kosik->count(); $i++) :?>
    <div class="pizza">
        Pizza #<?=$i+1?><br>
        Základ: <?=$zaklad[$kosik->vybratPolozku($i)->zaklad]?><br>
        Suroviny: <ul>
         <?foreach ($kosik->vybratPolozku($i)->suroviny as $sur) :?>
        <li><?=$suroviny[$sur]?></li>
        <?endforeach?>
        </ul>
        <a href="odstranit.php?id=<?=$i?>"><button>Odstranit</button></a>
    <hr>
    </div>
    <?endfor ?>
    </div>
</body>
</html>