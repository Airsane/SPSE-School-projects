<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Text</title>
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container">
        <div class="text-center">
            <h1>Výpis textu a proměnných</h1>

            <div class="card">
                <div class="card-header">
                    Proměnné začínají $, do echo je můžeme vložit přímo, pokud textový řetězec uzavřeme " a ' dáváme
                    html parametrům uvnitř.
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <?php
                    $jmeno = "Patrik Kábele";
                    echo "<p>Vypsané pomocí echo\n";
                    echo 'ahoj ' . $jmeno . " jak se máš ";
                    echo ($jmeno);
                    echo (" Patrik Kábele</p>");
                    ?>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>