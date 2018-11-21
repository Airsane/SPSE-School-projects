<!DOCTYPE html>
<html lang="en">
<?php

$mesic = array(1 => "leden", "únor", "březen", "duben", "květen", "červen", "červenec", "srpen", "září", "říjen", "listopad", "prosinec");
    //$m = 9;
$m = date("n");
$n = rand(20, 50);
?>

<head>
    <meta charset="UTF-8">
    <title>Text</title>

</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="text-center">
            <h1>Výpis tabulky a pole</h1>

            <div class="row"><div class="col-md-6">
                <div class="card">
                    <div class="card-header">Aktualní měsíc:
                        <?= $mesic[$m] ?>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <?= var_dump($mesic) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><div class="card">
                <div class="card-header">Tabulka
                    <?= $n ?> čísel po 5 buňkách na řádku:
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <table style="margin:auto;">
                            <tr>
                                <? for ($i = 1; $i <= $n; $i++) {
                                    echo "<td>$i</td>";

                                    if ($i % 5 == 0 && $i != $n) {
                                        echo "</tr><tr>";
                                    } //odřádkování po 5 buňkách
                                } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div></div></div>
        </div>
    </div>
</body>

</html>