
<?php

$zip = new ZipArchive();
$filename = "upload/test112.zip";

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}
$thisdir = "upload";

$zip->addFromString("testfilephp.txt" . time(), "#1 This is a test string added as testfilephp.txt.\n");
$zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
$zip->addFile($thisdir."/Male.png","/Male.png");
$zip->addFile($thisdir."/Female.png","/Female.png");

// $zip->addFile("Male.png");

// $zip->addFile($thisdir . "/too.php","/testfromfile.php");

echo "numfiles: " . $zip->numFiles . "\n";
echo "status:" . $zip->status . "\n";
$zip->close();
?>
