<?
require_once("databaze.php");
$databaze = new Databaze();
$studentiA = $databaze->getUsersByGroup(1);
$studentiB = $databaze->getUsersByGroup(2);
$sluzba = $databaze->getService();
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
            <div class="row">
                <div class="col-12"><h1>Poslední změna: <?=$sluzba[0]->datum?></h1></div>
                <div class="col-6">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jméno</th>
                                <th scope="col">Příjmení</th>
                                <th scope="col">Služba</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($studentiA as $student) : ?>
                            <tr>
                                <th scope="row">
                                    <?=$student->idstudenti?>
                                </th>
                                <td>
                                    <?=$student->jmeno?>
                                </td>
                                <td>
                                    <?=$student->prijmeni?>
                                </td>
                                <td>
                                    <?if($student->sluzba == 1) :?><i class="fas fa-check"></i>
                                    <?endif?>
                                </td>
                            </tr>
                            <? endforeach ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-6">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jméno</th>
                                <th scope="col">Příjmení</th>
                                <th scope="col">Služba</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($studentiB as $student) : ?>
                            <tr>
                                <th scope="row">
                                    <?=$student->idstudenti?>
                                </th>
                                <td>
                                    <?=$student->jmeno?>
                                </td>
                                <td>
                                    <?=$student->prijmeni?>
                                </td>
                                <td>
                                    <?if($student->sluzba == 1) :?><i class="fas fa-check"></i>
                                    <?endif?>
                                </td>
                            </tr>
                            <? endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12"><a href="./serviceDown.php"><button class="btn-dark btn">Předchozí Služba</button></a></div>
            <div class="col-12"><a href="./serviceUp.php"><button class="btn-dark btn">Další Služba</button></a></div>
        </div>
    </div>
</body>

</html>