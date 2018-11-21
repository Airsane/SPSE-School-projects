<!DOCTYPE html>
<html lang="en">
<?php
    $slozka = scandir('.');
    $slozky = array();
    foreach ($slozka as $slozka) {
        if (is_dir($slozka) && $slozka != '.' && $slozka != '..') {
            $slozky[] = $slozka;
        }
    }

    function getFilesFromFolder($folder)
    {
        $temp = scandir($folder);
        $soubory = array();
        foreach ($temp as $soubor) {
            if (!is_dir($soubor) && $soubor != "thumbs") {
                $soubory[] = $soubor;
            }
        }
        generateImages($folder, $soubory);
    }

    function getThumb($folder, $name)
    {
        $temp = scandir($folder . "/thumbs");
        foreach ($temp as $soubor) {
            if ($soubor == $name) {
                return $soubor;
            }
        }
        return false;
    }

    function generateImages($folder, $files)
    {
        $text = "";
        foreach ($files as $soubor) {
            $thumb = getThumb($folder, $soubor);
            if (!$thumb) {
                $text = $text . '<img src="' . $folder . '/' . $soubor . '" original="' . $folder . '/' . $soubor . '" srcset="">';
            } else
                $text = $text . '<img src="' . $folder . '/thumbs/' . $thumb . '" original="' . $folder . '/' . $soubor . '" srcset="">';
        }
        echo $text;
    }

    function generateGallery($slozky)
    {
        foreach ($slozky as $slozka) {
            echo '<div class="galerie"><h1>' . $slozka . '</h1>';
            getFilesFromFolder($slozka);
            echo '</div><hr>';
        }
    }
    ?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <script src="../jquery-3.3.1.min.js"></script>
    <title>Složky</title>
</head>

<body>
<?php require_once '../nav.php' ?>
    <div class="container-fluid">
        <div class="padding">
            <div class="text-center">
                <h1>Práce se složkami</h1>
                <hr>    
                <?php generateGallery($slozky); ?>
                <div id="overlay" style="background-color: rgb(119, 119, 119); opacity: 0.7; cursor: pointer; height: 1717px; display: none;"></div>
            <div id="lightbox-wrap" style="display: none; left: 20%;  ">
                <div id="lightbox-outer">
                    <div id="lightbox-content" style="max-height: 655px; border-width: 10px;width: 942px;height: auto;"><img
                            id="lightbox-img" src="http://farm8.staticflickr.com/7496/15959236842_6dbcb5b4c8_b.jpg" alt=""></div><a
                        id="lightbox-close" style="display: inline;"></a>
                    <div id="lightbox-title" style="display: none;"></div><a href="javascript:;" id="lightbox-left"><span
                            class="fancy-ico" id="lightbox-left-ico"></span></a><a href="javascript:;" id="lightbox-right"><span
                            class="fancy-ico" id="lightbox-right-ico"></span></a>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
<script src="lightbox.js"></script>

</html>