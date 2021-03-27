<?
$folders = glob('./a-foto/*');
foreach ($folders as $folder) {
    if (!is_dir($folder)) continue;
    echo "<h1>$folder</h1>";
    foreach (glob("$folder/*") as $file) {
        $split = explode("/", $file);
        if (is_dir($file) || $split[3] == "Thumbs.db") continue;
        echo "<a href='$file'><img src='$split[0]/$split[1]/$split[2]/thumbs/$split[3]'></a>";
    }
}
?>