<? require_once('spojeniDB.class.php');
require_once('Flashka.class.php');
session_start();
$databaze = new spojeniDB();
$flashky = $databaze->getFlashky();
if(!empty($_SESSION['succ'])){
    echo "<div class='alert alert-success' role='alert'>$_SESSION[succ]</div>";
    $_SESSION['succ'] = "";
}

if(!empty($_SESSION['err'])){
    echo "<div class='alert alert-danger' role='alert'>$_SESSION[err]</div>";
    $_SESSION['err'] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flashky</title>
    <link rel="stylesheet" href="../res/css/bootstrap.min.css">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/fontawesome/css/all.css" crossorigin="anonymous">
    <script src="../res/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../res/js/popper.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script>
    <style>.flashka {
    width: calc(25% - 10px);
    float: left;
    background: rgba(0, 0, 0, .03);
    padding: 5px;
    margin: 5px;
}

</style>
</head>

<body>
    <div class="container">
        <form action="vlozit.php" method="post">
            <div class="form-group">Název: <input type="text" name="nazev" placeholder="Název" class="form-control" required><br>Cena:
                <input type="number" name="cena" placeholder="Cena" class="form-control" min=1 required><br>Velikost: <input
                    type="number" class="form-control" placeholder="Velikost" name="velikost" min=2 step=2 required><br><input
                    type="submit" class="btn btn-primary" value="odeslat"></div>
        </form>
    </div>
    <div class="container-fluid">
        <? foreach ($flashky as $flashka) : ?>
        <?= $flashka->vypis() ?>
        <? endforeach ?>
    </div>
</body>

</html>