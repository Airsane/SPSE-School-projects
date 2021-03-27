<?
include_once "clovek.php";
include_once "databaze.php";
$databaze = new Databaze(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="vlozeni.php" method="post">
        <input type="text" name="jmeno" id="" placeholder="Jméno" required><br>
        <input type="text" name="prijmeni" placeholder="Přijmení" required><br>
        <input type="date" name="datumNarozeni" placeholder="Datum Narození" required><br>
        <input type="radio" name="pohlavi" value="M" required>M<input type="radio" name="pohlavi" value="Z" required>Ž
        <br><input type="submit" value="Odeslat"></form>
    <? $lidi = $databaze->getLidi();
    foreach ($lidi as $clovek):
        ?>
    <div class="clovek">
        <hr>
        <div>Jméno:
            <?= $clovek->jmeno ?>
        </div>
        <div>Příjmení:
            <?= $clovek->prijmeni ?>
        </div>
        <div>Datum Narození:
            <?= $clovek->datumNarozeni ?>
        </div>
        <div>Pohlaví:
            <?= $clovek->pohlavi ?>
        </div>
    </div>
    <? endforeach ?>
</body>

</html> 