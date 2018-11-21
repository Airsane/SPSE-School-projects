<!DOCTYPE html>
<html lang="en">
<?php
function zkraceniTextu($text, $delka)
{
    if (mb_strlen($text) > $delka) {
        $zkracenyText = mb_substr($text, 0, $delka, "UTF-8");
        $poziceMezery = mb_strrpos($zkracenyText, " ", "UTF-8");
        $zkracenyText = mb_substr($zkracenyText, 0, $poziceMezery, "utf-8");
        $zkracenyText .= "...";
        return $zkracenyText;
    }
    return $text;
}

function bezDiakritiky($text)
{
    $text = iconv("UTF-8", "ASCII//TRANSLIT", $text);
    $text = str_replace("'", "", $text);
    return $text;
}

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Vlastní Funkce</title>
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="text-center">
            <h1>Vlastní funkce</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Zkrácení textu</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <?php
                                $babickaText = "Ony znaly více babiček, podoby jejich se jim v hlavě pletly, nevěděly však, ke které tu svou babičku př ipodobnit. Tu konečně přijíždí k stavení vozík! „Babička už jede!“ rozlehlo se po domě; pan Prošek, paní, Bětka nesouc na rukou kojence, děti i dva velicí psové, Sultán a Tyrl, všecko vyběhlo přede dvéře vítat babičku ";
                                echo ('<p>' . zkraceniTextu($babickaText, 70) . '</p>');

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Bez Diakritiky</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                českoěščřžýáíé ĚŠČŘŽÝÁÍÉ
                                <?php
                                echo bezDiakritiky("českoěščřžýáíé ĚŠČŘŽÝÁÍÉ");
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>