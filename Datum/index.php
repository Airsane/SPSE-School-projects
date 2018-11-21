<!DOCTYPE html>
<html lang="en">
<?php
    $datum = getdate();
    $week = array("Neděle","Pondělí","Úterý","Středa","Čtvrtek","Pátek","Sobota");
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Datum</title>
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container">
        <div class="text-center">
            <h1>Práce s datem</h1>

            <div class="card">
                <div class="card-body"><div class="card-title">Dneska je:
                    <?= $week[$datum['wday']]; ?>
                </div></div>
            </div>
            <div class="card">
                <div class="card-body"><div class="card-title">Prvním dnem v měsíci je
                    <?= $week[date('w',strtotime(date('Y-m-01')))] ?>
                </div></div>
            </div>
            <div class="card">
                <div class="card-body"><div class="card-title">Posledním dnem v měsíci je
                    <?= $week[date('w',strtotime(date('Y-m-t')))]; ?>
                </div></div>
            </div>
        </div>
    </div>
</body>

</html>