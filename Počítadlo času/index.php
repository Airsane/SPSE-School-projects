<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../res/css/bootstrap.min.css">
    <script src="../res/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../res/js/popper.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script>
    <script src="./svatek.js"></script>
    <?php
    $week = array("Neděle","Pondělí","Úterý","Středa","Čtvrtek","Pátek","Sobota");
    if(isset($_GET['date'])){
        $date1 = new DateTime();
        $date2 = new DateTime($_GET['date']);
        if($date2 > $date1) $date2->modify('+1 day');
        $interval = $date1->diff($date2);
        $rok = $date2->format('Y');
        $mesic = $date2->format('m');
        $den = $date2->format('d');
    }
    ?>
    <style>
        .padding{
        padding: 1em;
        }</style>
    <title>Document</title>
</head>

<body>
<?php require_once '../nav.php' ?>
    <div class="container">
        <div class="padding">
        <h1>Počítadlo času</h1>
            <form method="GET">
                <div class="form-group"><label for="datehelp">Datum</label><input type="date" class="form-control" id="datehelp"
                        name="date" value="<?=isset($_GET['date']) ? $_GET['date'] : ''?>" placeholder="Vložte datum">
                </div>

                <button type="submit" class="btn btn-primary">Odeslat</button>
            </form>
            <?php if(isset($date2)) :?>
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-title">Zbývá</div>
                    <h2>
                        <?=$interval->format('%r%a dnů')?>
                    </h2>
                    <div class="card-title">Svátek má</div>
                    <h2 id="svatek"></h2>
                    <div class="card-title">Byl to den</div>
                    <h2>
                        <?=$week[$date2 > $date1 ? $date2->format('w')-1 : $date2->format('w')+1]?>
                    </h2>
                    <div class="card-title">Měsíc začínal dnem</div>
                    <?php $zacatek = $date2->setDate($rok,$mesic,1); ?>
                    <h2>
                        <?=$week[$zacatek->format('w')]?>
                    </h2>
                    <script>document.querySelector('#svatek').innerText = when(<?=$date2 > $date1 ? $den-1 : $den?>,<?=$mesic?>)[0].name;</script>
                </div>
                <? endif?>
            </div>
        </div>
    </div>
    
</body>

</html>