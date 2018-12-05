<?php
$pole = ["jahoda", "banán", "pomeranč", "rajče", "ananas", "na", "pizzu", "nepatří"];

function fc1(bool $vzestupne, array $pole) : array
{
    if ($vzestupne) {
        $upD = 1;
    } else {
        $upD = -1;
    }
    for ($j = 0; $j < count($pole); $j++) {
        for ($i = 0; $i < count($pole) - 1; $i++) {

            if (($pole[$i] <=> $pole[$i + 1]) === $upD) {
                $temp = $pole[$i + 1];
                $pole[$i + 1] = $pole[$i];
                $pole[$i] = $temp;
            }
        }
    }
    return $pole;
}

function fc2(int $count) : string
{
    switch ($count) {
        case 1:
            return $count . ' příspěvek';
        case 2:
        case 3:
        case 4:
            return $count . ' příspěveky';
        default:
            return $count . ' příspěveků';
    }
}

function fc3($day)
{
    $dny = ["Pondělí", "Úterý", "Středa", "Čtvrtek", "Pátek", "Sobota", "Neděle"];
    return $dny[date("N", strtotime($day)) - 1] . '<br>';
}

for ($i = 0; $i < 10; $i++) {

}



require_once('Autobus.class.php');



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
    <?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="text-center">
            <h1>Příklady 2. skupina</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Seřazení funkce</h2>
                    </div>
                    <div class="card-text">
                        <?= var_dump(fc1(true, $pole)) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Příspěvky</h2>
                    </div>
                    <div class="card-text">
                        <? for ($i = 0; $i < 10; $i++) : ?>
                        <p>
                            <?= fc2($i) ?>
                        </p>
                        <? endfor ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Den z aj zkratky na cz</h2>
                    </div>
                    <div class="card-text">
                        <?= fc3("sun"); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Autobus</h2>
                    </div>
                    <div class="card-text">
                        <? $a1 = new Autobus();
                    $a1->regZnacka = 50;
                    echo $a1->regZnacka; ?>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>