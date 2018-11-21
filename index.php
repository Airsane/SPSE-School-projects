<!DOCTYPE html>
<html lang="en">
<?php
require_once('soubory.php');
$folderManager = new Slozky('.');
$folderManager->nacti();

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Rozcestník</title>
    <link rel="stylesheet" href="./res/css/bootstrap.min.css">
    <link rel="stylesheet" href="./res/css/style.css">
    <script src="./res/js/jquery-3.3.1.slim.min.js"></script>
    <script src="./res/js/popper.min.js"></script>
    <script src="./res/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="./index.php">Rozcestník</a>

    </nav>
    <div class="container-fluid">
        <div class="padding">
            <div class="text-center">
                <h1>Rozcestník</h1>
                <div class="odkazy">
                <?php
                $folderManager->vypis();
                ?>
            </div>
            </div>
        </div>
    </div>

</body>

</html>