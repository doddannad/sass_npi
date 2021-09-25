<?php
include 'prevent.php';
include 'db_config.php';

$fetchProjects = mysqli_query($db_connect, "SELECT * FROM project_detail ");
$projectsArray = array();
while ($row = mysqli_fetch_array($fetchProjects)) {
	$projectsArray[] = $row;
}


foreach ($projectsArray as $projects) {
	$projectsID = $projects['project_id'];
	$projectsName = $projects['project_name'];
	$imgUrl = "banner_image_uploads/" . $projects['banner_image'];

	if (file_exists($imgUrl)) {
		$copyFrom = $imgUrl;
		$copyTo = 'thumbnails/' . $projects['banner_image'];
		if (copy($copyFrom, $copyTo)) {
			$thumb = 'thumbnails/' . $projects['banner_image'];

			if (file_exists($thumb)) {
				$name = $projects['banner_image'];
				$newName = pathinfo($name)['filename'] . '.jpeg';
				$dir = 'thumbnails/';
				$thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);

				// Check Project
				$checkProject = mysqli_query($db_connect, "SELECT * FROM thumbnails WHERE project_id = '$projectsID' ");
				if (mysqli_num_rows($checkProject) <= 0) {
					$insertQuery = mysqli_query($db_connect, "INSERT INTO thumbnails (project_id, thumbnails_img, thumbnails_created) VALUES ('$projectsID', '$newName', '$now') ");
					if ($insertQuery) {
						convertThumbImage($thumb, $thumb_ext, $name, $newName, $dir);
					}
				} else {
					echo "<script>alert('Images Resized Sucess')</script>";
					echo "<script>parent.location='thumbnails.php'</script>";
				}

				// Delete webp images
				unlink($thumb);
			}
		} else {
			echo "error";
		}
	}
}


function convertThumbImage($thumb, $thumb_ext, $name, $newName, $dir)
{
	switch ($thumb_ext) {
		case 'webp':
			$createFrom = imagecreatefromwebp($thumb);
			imagejpeg($createFrom, $dir . $newName, 100);
			imagedestroy($createFrom);

			// Reduce Size
			$thumNew = $dir . $newName;
			list($width, $height, $type, $attr) = getimagesize($thumNew);
			$oldWidth = $width;
			$oldHeight = $height;
			$newWidth = 100;
			$newHeight = 80;

			// Resampling the image  
			$resize = imagecreatetruecolor($newWidth, $newHeight);
			$image = imagecreatefromjpeg($thumNew);
			imagecopyresampled(
				$resize,
				$image,
				0,
				0,
				0,
				0,
				$newWidth,
				$newHeight,
				$oldWidth,
				$oldHeight
			);
			imagejpeg($resize, $dir . $newName, 100);

			break;

		case 'jpg':
		case 'jpeg':
			$createFrom = imagecreatefromjpeg($thumb);
			imagejpeg($createFrom, $dir . $newName, 100);
			imagedestroy($createFrom);

			// Reduce Size
			$thumNew = $dir . $newName;
			list($width, $height, $type, $attr) = getimagesize($thumNew);
			$oldWidth = $width;
			$oldHeight = $height;
			$newWidth = 100;
			$newHeight = 80;

			// Resampling the image  
			$resize = imagecreatetruecolor($newWidth, $newHeight);
			$image = imagecreatefromjpeg($thumNew);
			imagecopyresampled(
				$resize,
				$image,
				0,
				0,
				0,
				0,
				$newWidth,
				$newHeight,
				$oldWidth,
				$oldHeight
			);
			imagejpeg($resize, $dir . $newName, 100);
			break;

		case 'png':
			$createFrom = imagecreatefrompng($thumb);
			imagejpeg($createFrom, $dir . $newName, 100);
			imagedestroy($createFrom);

			// Reduce Size
			$thumNew = $dir . $newName;
			list($width, $height, $type, $attr) = getimagesize($thumNew);
			$oldWidth = $width;
			$oldHeight = $height;
			$newWidth = 100;
			$newHeight = 80;

			// Resampling the image  
			$resize = imagecreatetruecolor($newWidth, $newHeight);
			$image = imagecreatefromjpeg($thumNew);
			imagecopyresampled(
				$resize,
				$image,
				0,
				0,
				0,
				0,
				$newWidth,
				$newHeight,
				$oldWidth,
				$oldHeight
			);
			imagejpeg($resize, $dir . $newName, 100);
			break;

		case 'gif':
			$createFrom = imagecreatefromgif($thumb);
			imagejpeg($createFrom, $dir . $newName, 100);
			imagedestroy($createFrom);

			// Reduce Size
			$thumNew = $dir . $newName;
			list($width, $height, $type, $attr) = getimagesize($thumNew);
			$oldWidth = $width;
			$oldHeight = $height;
			$newWidth = 100;
			$newHeight = 80;

			// Resampling the image  
			$resize = imagecreatetruecolor($newWidth, $newHeight);
			$image = imagecreatefromjpeg($thumNew);
			imagecopyresampled(
				$resize,
				$image,
				0,
				0,
				0,
				0,
				$newWidth,
				$newHeight,
				$oldWidth,
				$oldHeight
			);
			imagejpeg($resize, $dir . $newName, 100);
			break;

		default:

			break;
	}
}

?>

<!-- 
$filename = basename($file);
$file_extension = strtolower(substr(strrchr($filename,"."),1));

switch( $file_extension ) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    case "svg": $ctype="image/svg+xml"; break;
    default:
}

header('Content-type: ' . $ctype);




function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
 -->