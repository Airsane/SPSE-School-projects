<?php

function datumDb($datum)
{
    return date('Y-m-d', strtotime($datum));
}

function RCdatum($rc)
{
    //vytvoření datumu (v databázovém tvaru) z rodného čísla
    $rc = RCbezLomitka($rc);
    if (!RCovereni($rc))
        return;
    $y = substr($rc, 0, 2);
    $m = substr($rc, 2, 2);
    $d = substr($rc, 4, 2);
    if (intval($m) > 12) {
        $m = intval($m) - 50;
    }
    if (intval($y) >= 54) {
        $y = '19' . $y;
    }
    return datumDb($d . '.' . $m . '.' . $y);
}

function RCbezLomitka($rc)
{
    //odstranění / z rodného čísla (pokud tam je)
    $rc = str_replace("/", "", $rc);
    return $rc;
}

function RCovereni($rc)
{
    //ověření rodného čísla – funkce vrátí true, je-li rodné číslo (10 číslic bez lomítka – nejprve volta předchozí funkci) dělitelné 11
    return (strlen(RCbezLomitka($rc)) == 10 && intval(RCbezLomitka($rc) % 11) == 0);
}

function priponaSouboru($file)
{
    //funkce vrátí konec textového řetězce za poslední tečkou
    return mb_substr($file, mb_strrpos($file, ".", 'UTF-8'));
}

function PSCbezMezery($psc)
{
    return str_replace(" ", "", $psc);
}

function PSCovereni($psc)
{
    //ověření, že textový řetězec obsahuje pouze číslice a že jich je 5 – předtím volání funkce PSCbezMezery
    $psc = PSCbezMezery($psc);
    return (strlen($psc) == 5);
}

function PSCsMezerou($psc)
{
    //vložení mezery do PSČ
    $part1 = substr($psc, 0, 3);
    $part2 = substr($psc, 3, 5);
    return $part1 . ' ' . $part2;
}


?>