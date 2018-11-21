<?php
/*
    Načte se (opakovaně) do skriptu index.php, proto se proměnná jmenuje stejně jako v cyklu.
 */
?>
<div>
<h3>Autobus #<?=$bus->getEvidencniCislo();?></h3>
<p><span>Registracni znacka</span> <?=$bus->getRegistracniZnacka();?></p>
<p><span>Kapacita</span> <?=$bus->getKapacita();?></p>
<p><span>Rok vyroby</span> <?=$bus->getRokVyroby();?></p>
</div>