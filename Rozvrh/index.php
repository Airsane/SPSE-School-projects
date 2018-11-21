<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rozvrh</title>
    <?
    $rozvrh_raw = file_get_contents('tridy.json');
    $rozvrhJson = json_decode($rozvrh_raw);
    $dny = ["Po","Út","St","Čt","Pá"];
    ?>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="text-center">
            <h1>Rozvrh</h1>
            <div class="row">
                <?php foreach ($rozvrhJson as $kys =>$trida) :?>
                <?php foreach($trida as $key => $trida2) :?>
                <div class="col-md-12">
                <div class="text-center">
                <h2>
                    <?= $key?>
                </h2>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="day"></td>
                        <th>0.<div>07:05~07:50</div>
                        </th>

                        <th>1.<div>08:00~08:45</div>
                        </th>

                        <th>2.<div>08:50~09:35</div>
                        </th>

                        <th>3.<div>09:45~10:30</div>
                        </th>

                        <th>4.<div>10:50~11:35</div>
                        </th>

                        <th>5.<div>11:45~12:30</div>
                        </th>

                        <th>6.<div>12:40~13:25</div>
                        </th>

                        <th>7.<div>13:35~14:20</div>
                        </th>

                        <th>8.<div>14:25~15:10</div>
                        </th>

                        <th>9.<div>15:15~16:00</div>
                        </th>

                        <th>10.<div>16:05~16:50</div>
                        </th>

                        <th>11.<div>16:55~17:40</div>
                        </th>

                        <th>12.<div>17:45~18:30</div>
                        </th>
                    </tr>
                    <?php foreach($trida2->items as $ree=>$items) : ?>
                    <tr>
                        <td class="day"><?=$dny[$ree]?></td>
                        <?php for($i=0; $i < 13; $i++) : ?>
                        <? if(isset($items->{$i})) {?>
                        <td class="hourName">
                            <div class="sbj">
                                <div class="top"><a href="#"><span>
                                            <?=$items->{$i}[0]->subject?></span></a></div>
                                <div class="bottom"><a href="#"><span>
                                            <?=$items->{$i}[0]->cls?>&nbsp;</span></a><a href="#"><span>
                                            <?=$items->{$i}[0]->teacher?></span></a></div>
                            </div>
                        </td>
                        <? }  else {?>
                        <td class="hourName">
                            <div class="sbj">
                                <div class="top"></div>
                                <div class="bottom"></div>
                            </div>
                        </td>
                        <? }?>
                        <? endfor ?>
                    </tr>
                    <? endforeach ?>


                    <? endforeach ?>
                </table>
                        </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
    <script src="./script.js"></script>
</body>

</html>