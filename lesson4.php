<?php
header("Content-type: text/html; charset=utf-8");
?>

    <img src="images/min/1.jpg" data-full_image_url="images/max/1.jpg" alt="Картинка1" onclick="window.open(src)">
    <img src="images/min/2.jpg" data-full_image_url="images/max/2.jpg" alt="Картинка2" onclick="window.open(src)">
    <img src="images/min/3.jpg" data-full_image_url="images/max/3.jpg" alt="Картинка3" onclick="window.open(src)">
    <img src="images/min/4.jpg" data-full_image_url="images/max/4.jpg" alt="Картинка4" onclick="window.open(src)">

    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name='file'>
        <input type="submit">
    </form>

<?php
include __DIR__ . '/config/main.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        if (!file_exists(UPLOADS_DIR)) {
            mkdir(UPLOADS_DIR);
        }
        $filename = UPLOADS_DIR . $_FILES['file']['name'];

        if (file_exists($filename)) {
            $filename =  getUniqName(UPLOADS_DIR, $_FILES['file']['name']);
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $filename);


        $newFileName = dirname($filename);
        if (!file_exists(UPLOADS_MIN_DIR)) {
            mkdir(UPLOADS_MIN_DIR);
        }
        $newFileName = UPLOADS_MIN_DIR . basename($filename);
        imageresize($newFileName, $filename, 30, 75);

        $path = substr(UPLOADS_MIN_DIR, strlen(DOCUMENT_ROOT)) . basename($newFileName);
        $pathToOrigin = substr(UPLOADS_DIR, strlen(DOCUMENT_ROOT)) . basename($filename);
        print "<img src=\"" . $path . "\" alt='Картинка' onclick='window.open(\"" . $pathToOrigin . "\")' >";

    }
}

function imageresize($outfile, $infile, $percents, $quality)
{
    $im = imagecreatefromjpeg($infile);
    $w = imagesx($im) * $percents / 100;
    $h = imagesy($im) * $percents / 100;
    $im1 = imagecreatetruecolor($w, $h);
    imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im));
    imagejpeg($im1, $outfile, $quality);
    imagedestroy($im);
    imagedestroy($im1);

    return $outfile;
}

function getUniqName($dir, $name){
$uniqId = count(scandir($dir));

do {
    $newName =  $dir . pathinfo($name)['filename']. '_'. $uniqId . '.' . pathinfo($name)['extension'];
    $uniqId++;
} while (file_exists($newName)) ;
return $newName;
}
