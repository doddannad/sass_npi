<?php
include 'db_config.php';

$select_project_list = mysqli_query($db_connect, "SELECT * FROM project_detail AS pd ");
$project_detail = array();
while ($row = mysqli_fetch_array($select_project_list)) {
	$project_detail[] = $row;
}

// # jpeg, jpg, or png Formated Banner Images #
$fetcBannerImages = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE banner_image LIKE '%.jpg%' OR banner_image LIKE '%.jpeg%' OR banner_image LIKE '%.png%' OR banner_image LIKE '%.gif%' LIMIT 1 ");
$bannersArray = array();
while ($row = mysqli_fetch_array($fetcBannerImages)) {
	$bannersArray[] = $row;
}
// ./ # jpeg, jpg, or png Formated Banner Images #

// # jpeg, jpg, or png Formated Master Plan And Floor Plans #
$fetcMasterAndFloor = mysqli_query($db_connect, "SELECT * FROM files_detail AS fd WHERE fd.files LIKE '%.jpg%' OR fd.files LIKE '%.jpeg%' OR fd.files LIKE '%.png%' OR fd.files LIKE '%.gif%'  ");
$masterAndFloorArray = array();
while ($row = mysqli_fetch_array($fetcMasterAndFloor)) {
	$masterAndFloorArray[] = $row;
}
// ./ # jpeg, jpg, or png Formated Master Plan And Floor Plans #

// # jpeg, jpg, or png Formated Builders Logo #
$fetchBuildersLogo = mysqli_query($db_connect, "SELECT * FROM builders_list WHERE builders_logo LIKE '%.jpg%' OR builders_logo LIKE '%.jpeg%' OR builders_logo LIKE '%.png%' OR builders_logo LIKE '%.gif%' ");
$buildersLogoArray = array();
while ($row = mysqli_fetch_array($fetchBuildersLogo)) {
	$buildersLogoArray[] = $row;
}
// ./ # jpeg, jpg, or png Formated Builders Logo #







function convertIntoToWebp($dir, $name, $newName)
{
	$img = imagecreatefromstring(file_get_contents($dir . $name));
	imagepalettetotruecolor($img);
	imagealphablending($img, true);
	imagesavealpha($img, true);
	imagewebp($img, $dir . $newName, 100);
	imagedestroy($img);
}
/* 
######### Convert TO Webp CODE ########## 

$im = imagecreatefromstring(file_get_contents('path/to/image.jpg')); // Create image identifier
imagewebp($im, 'path/to/image.webp'); // Generate webp image and save to location
imagedestroy($im); // Free up image identifier

*/
?>
<!DOCTYPE html>
<html>

<head>
	<title>ConverTowebp</title>
</head>

<body>
	<h1 style="text-align:center;">Convert JPG/PNG Image to WEBP Using PHP</h1>

	<h2 style="text-align: center;color: #F23B3B;padding-bottom: 10px;">jpg, jpeg, gif, format of Builders Logos</h2>
	<table style="width: 100%;border: 1px double #ddd;text-align: center;">
		<thead>
			<tr>
				<th style="border: 1px double #ddd;">SL</th>
				<th style="border: 1px double #ddd;">Builders Name</th>
				<th style="border: 1px double #ddd;">Logo Name</th>
				<th style="border: 1px double #ddd;">Logos</th>
			</tr>
			<?php
			$i = 0;
			foreach ($buildersLogoArray as $buildersLogo) {
				$i++;
				$buildersLogoUrl = 'admin/files_uploads/' . $buildersLogo['builders_logo'];
				if (file_exists($buildersLogoUrl)) {
					$buildersOldName = $buildersLogo['builders_logo'];
					$buildersNewName = pathinfo($buildersLogoUrl)['filename'] . '.webp';

					$updateBuildersLogoWebp = mysqli_query($db_connect, "UPDATE builders_list SET builders_logo = '$buildersNewName' WHERE builders_id = '" . $buildersLogo['builders_id'] . "' ");
					if ($updateBuildersLogoWebp) {
						$dir = 'admin/files_uploads/';
						$name = $buildersOldName;
						$newName = $buildersNewName;

						convertIntoToWebp($dir, $name, $newName);
					}
				} else if (!file_exists($buildersLogoUrl)) {
				}
			?>
				<tr>
					<td style="border: 1px double #ddd;"><?php echo $i ?> <?php echo $buildersLogo['builders_id'] ?></td>
					<td style="border: 1px double #ddd;"><?php echo $buildersLogo['builders_name'] ?></td>
					<td style="border: 1px double #ddd;"><?php echo $buildersLogo['builders_logo'] ?></td>
					<td style="border: 1px double #ddd;"><img src="<?php echo $buildersLogoUrl ?>" style="width: 50px;height: 50px;"></td>
				</tr>
			<?php } ?>
		</thead>
	</table>

	<h2 style="text-align: center;color: #F23B3B;padding-bottom: 10px;">jpg, jpeg, gif, format images</h2>
	<table style="width: 100%;border: 1px double #ddd;text-align: center;">
		<thead>
			<tr>
				<th style="border: 1px double #ddd;">SL</th>
				<th style="border: 1px double #ddd;">Project Name</th>
				<th style="border: 1px double #ddd;">Banner Name</th>
				<th style="border: 1px double #ddd;">Banner</th>
			</tr>
			<?php
			$i = 0;
			foreach ($bannersArray as $banners) {
				$i++;
				$bannersUrl = 'admin/banner_image_uploads/' . $banners['banner_image'];
				if (file_exists($bannersUrl)) {
					// Image
					$dir = 'admin/banner_image_uploads/';
					$bannerOldName = $banners['banner_image'];
					$bannerNewName = pathinfo($bannersUrl)['filename'] . '.webp';
					$updateWebp = mysqli_query($db_connect, "UPDATE project_detail SET banner_image = '$bannerNewName', created_date = '$now' WHERE project_id = '" . $banners['project_id'] . "' ");
					if ($updateWebp) {
						$dir = 'admin/banner_image_uploads/';
						$name = $bannerOldName;
						$newName = $bannerNewName;

						convertIntoToWebp($dir, $name, $newName);
					}
				} else if (!file_exists($bannersUrl)) {
				}
			?>
				<tr>
					<td style="border: 1px double #ddd;"><?php echo $i ?></td>
					<td style="border: 1px double #ddd;"><?php echo $banners['project_name'] ?></td>
					<td style="border: 1px double #ddd;"><?php echo $banners['banner_image'] ?></td>
					<td style="border: 1px double #ddd;"><img src="<?php echo $bannersUrl ?>" style="width: 50px;height: 50px;"></td>
				</tr>
			<?php } ?>
		</thead>
	</table>

	<h2 style="text-align: center;color: #F23B3B;padding-bottom: 10px;">jpg, jpeg, gif, format Master And Floor Plans</h2>
	<table style="width: 100%;border: 1px double #ddd;text-align: center;">
		<thead>
			<tr>
				<th style="border: 1px double #ddd;">SL</th>
				<th style="border: 1px double #ddd;">Project Name</th>
				<th style="border: 1px double #ddd;">Files Name</th>
				<th style="border: 1px double #ddd;">Files</th>
			</tr>
			<?php
			$i = 0;
			foreach ($masterAndFloorArray as $masterAndFloor) {
				$i++;

				if (!empty($masterAndFloor['project_id'])) {
					$j = 0;
					foreach ($project_detail as $projects) {
						if (!$projects['project_id'] == $masterAndFloor['project_id']) {
							$projectName = '';
						} else if ($projects['project_id'] === $masterAndFloor['project_id']) {
							$projectName = $projects['project_name'];
						}
					}
				} else if (empty($masterAndFloor['project_id'])) {
					$projectName = 'Project Id Empty';
				}
				if (empty($projectName)) {
					$projectName = '';
				}

				$masterAndFloorUrl = 'admin/files_uploads/' . $masterAndFloor['files'];

				if (file_exists($masterAndFloorUrl)) {
					$masterAndFloorOldNames = $masterAndFloor['files'];
					$masterAndFloorNewNames = pathinfo($masterAndFloorUrl)['filename'] . '.webp';

					$updateMasterAndFloorWebp = mysqli_query($db_connect, "UPDATE files_detail SET files = '$masterAndFloorNewNames' WHERE files_detail_id = '" . $masterAndFloor['files_detail_id'] . "' ");
					if ($updateMasterAndFloorWebp) {
						$dir = 'admin/files_uploads/';
						$name = $masterAndFloorOldNames;
						$newName = $masterAndFloorNewNames;

						convertIntoToWebp($dir, $name, $newName);
					} else {
						echo "Error";
					}
				} else if (!file_exists($masterAndFloorUrl)) {
				}
			?>
				<tr>
					<td style="border: 1px double #ddd;"><?php echo $i ?> <?php echo $masterAndFloor['files_detail_id'] ?></td>
					<td style="border: 1px double #ddd;"><?php echo $projectName ?></td>
					<td style="border: 1px double #ddd;"><?php echo $masterAndFloor['files'] ?></td>
					<td style="border: 1px double #ddd;"><img src="<?php echo $masterAndFloorUrl ?>" style="width: 50px;height: 50px;"></td>
				</tr>
			<?php } ?>
		</thead>
	</table>


</body>

</html>