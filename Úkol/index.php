<!DOCTYPE html>
<html lang="en">
<?
    require('./moje_funkce.php');
    $datumDb=datumDb('5.12.2000');
    $prs=priponaSouboru('jahoda.txt');
    $pscsmez=PSCsMezerou('53002');
    $rcdatum=RCdatum('000428/3576');
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Rozcesník</title>
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="text-center">
           
            <div class="padding"> <h1>Úkol</h1><div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Datum databáze:</div>
                        <div class="card-body">
                            <div class="card-text"><?= $datumDb?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Přípona souboru:</div>
                        <div class="card-body">
                            <div class="card-text"><?=$prs?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">PSČ s mezerou:</div>
                        <div class="card-body">
                            <div class="card-text"><?=$pscsmez?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Datum z rodného čísla</div>
                        <div class="card-body">
                            <div class="card-text"><?=$rcdatum?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
    </div>
</body>

</html>