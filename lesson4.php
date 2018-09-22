<?php
header("Content-type: text/html; charset=utf-8");
?>

<img src="images/min/1.jpg" data-full_image_url="images/max/1.jpg" alt="Картинка1" onclick = "window.open(src)">
<img src="images/min/2.jpg" data-full_image_url="images/max/2.jpg" alt="Картинка2" onclick = "window.open(src)">
<img src="images/min/3.jpg" data-full_image_url="images/max/3.jpg" alt="Картинка3" onclick = "window.open(src)">
<img src="images/min/4.jpg" data-full_image_url="images/max/4.jpg" alt="Картинка4" onclick = "window.open(src)">

<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name = 'file'>
    <input type="submit">
</form>

<?php
include  __DIR__ . '/config/main.php';




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['file'])){
        if(!file_exists(UPLOADS_DIR)){
            mkdir(UPLOADS_DIR);
        }
        $filename = UPLOADS_DIR . $_FILES['file']['name'];
        if(file_exists($filename)){
            $filename .= uniqid();
        }
        move_uploaded_file($_FILES['file']['tmp_name'], $filename );
        $percent = 0.3;

        imageresize($outImg,$filename,30,75);

        var_dump($outImg);

       // print '<img src="'.$outFile.'" onclick = "window.open(src)">';
        //imagejpeg($image_p, null, 100);
    }
}


function imageresize($outfile,$infile,$percents,$quality) {
    $im=imagecreatefromjpeg($infile);
    $w=imagesx($im)*$percents/100;
    $h=imagesy($im)*$percents/100;
    $im1=imagecreatetruecolor($w,$h);
    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));
    //$outfile = $im1;
    //imagejpeg($im1,$outfile,$quality);
    var_dump($im1);
    var_dump($im1);
    imagedestroy($im);
    imagedestroy($im1);
}


?>






/**
 * Created by PhpStorm.
 * User: Дмитрий
 */