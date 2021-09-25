<?php
set_time_limit(10000);
include 'db_config.php';

$requiredMobileWidth = 768;
$requiredMobileHeight = 439;

$copyFrom = "banner_image_uploads/";
$toDir = "banner_image_uploads/banner_mobile/";
// Move all images files
$files = glob($copyFrom . "*.*");
$filesCount = count($files);
echo '<div><marquee behavior="alternate" direction="right" width="250" height="auto" style="padding:10px;background:red;border-radius:15px;color:#fff;margin:auto;display:block"><h2>Please Wait..!</h2></marquee></div>';

$i = 0;
foreach ($files as $file) {
    $i++;
    $copyTo = str_replace($copyFrom, $toDir, $file);
    // "<b>$i From </b>" . "<a href='$file'>$file</a>" . " <b>To</b> " . "<a href='$copyTo'>$copyTo</a>" . '<br>';

    // Uncomment Below Line and check from to where Coping
    // echo $i . ") <b>Copy From</b> " . '' . <a>$file</a> . " <b>Copy To</b>  " . $copyTo . '<br>';
    if (!file_exists($copyTo)) {
        copy($file, $copyTo);
        if ($i == $filesCount) {
            header("Refresh:0");
        }
    } else {
        $mobileBanner = str_replace($copyFrom, $toDir, $file);
        list($width, $height, $type, $attr) = getimagesize($mobileBanner);
        $oldMobileBannerWidth = $width;
        $oldMobileBannerHeight = $height;
        $extension = pathinfo($mobileBanner, PATHINFO_EXTENSION);

        $createFrom = imagecreatefromstring(file_get_contents($mobileBanner));
        $resizeWidthHeight  = imagecreatetruecolor($requiredMobileWidth, $requiredMobileHeight);

        switch ($extension) {
            case 'gif':
                imagecopyresampled($resizeWidthHeight, $createFrom, 0, 0, 0, 0, $requiredMobileWidth, $requiredMobileHeight, $oldMobileBannerWidth, $oldMobileBannerHeight);
                imagegif($resizeWidthHeight, $mobileBanner, 100);
                break;
            case 'jpg':
            case 'jpeg':
                imagecopyresampled($resizeWidthHeight, $createFrom, 0, 0, 0, 0, $requiredMobileWidth, $requiredMobileHeight, $oldMobileBannerWidth, $oldMobileBannerHeight);
                imagejpeg($resizeWidthHeight, $mobileBanner, 100);
                break;
            case 'jpg':
                imagecopyresampled($resizeWidthHeight, $createFrom, 0, 0, 0, 0, $requiredMobileWidth, $requiredMobileHeight, $oldMobileBannerWidth, $oldMobileBannerHeight);
                imagejpeg($resizeWidthHeight, $mobileBanner, 100);
                break;
            case 'webp':
                imagecopyresampled($resizeWidthHeight, $createFrom, 0, 0, 0, 0, $requiredMobileWidth, $requiredMobileHeight, $oldMobileBannerWidth, $oldMobileBannerHeight);
                imagewebp($resizeWidthHeight, $mobileBanner, 100);
                break;
            case 'png':
                imagecopyresampled($resizeWidthHeight, $createFrom, 0, 0, 0, 0, $requiredMobileWidth, $requiredMobileHeight, $oldMobileBannerWidth, $oldMobileBannerHeight);
                imagepng($resizeWidthHeight, $mobileBanner, 9);
                break;

            default:
                echo "<script>parent.location='thumbnails_mobile_banner.php'</script>";
                break;
        }
        echo "<script>parent.location='thumbnails_mobile_banner.php'</script>";
    }
}

/*
=======if you want to delete files from folder then you use unlink function ===
$deleteFrom = "banner_image_uploads/";
$files = glob($deleteFrom . "*.*");
foreach ($files as $file) {
    unlink($file);
}
exit();
*/