<!DOCTYPE html>
<?session_start();$zaklad = ['rajčatový','smetanový'];
$suroviny = ['sýr','šunka','žampiony','slanina','špenát','mozzarella','tuňák','olivy','kukuřice','ananas'];
if(!isset($_GET))
    die();
$id = $_GET['id'];
$pizza = $_SESSION["pizza$id"];
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Základ: <?=$zaklad[$pizza['zaklad']]?><br>
    Suroviny: <?foreach ($pizza['surovina'] as $sur) :?>
    <?=$suroviny[$sur]?><br>
    <?endforeach?>
</body>
</html>