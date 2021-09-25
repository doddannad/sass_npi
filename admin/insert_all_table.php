<?php
include 'prevent.php';
include 'db_config.php';
// -------Builders Add/Edit-----
if (isset($_POST['buildersAdd'])) 
{
	$builder=$_POST['builders_name'];
	$builder_url=$_POST['builders_url'];
	$builder_logo=$_FILES['builders_logo']['name'];

	$ongoingProject=$_POST['ongoing_projects'];
	$about_builders=addslashes($_POST['about_group']);

	$select_group=mysqli_query($db_connect,"SELECT * FROM builders_list WHERE builders_name='$builder'");
	if (mysqli_num_rows($select_group)>0) {
		echo "<script>alert('Builder Already Exist')</script>";
		echo "<script>parent.location='builders.php'</script>";
	}
	else
	{
		move_uploaded_file($_FILES['builders_logo']['tmp_name'], "files_uploads/".basename($builder_logo));
		$insert_query=mysqli_query($db_connect,"INSERT INTO builders_list(builders_name,builders_url, builders_logo, completed_projects,about_group)VALUES('$builder','$builder_url','$builder_logo','$ongoingProject','$about_builders')");
		if ($insert_query) 
		{
			echo "<script>alert('New Builder Added Successfully')</script>";
			echo "<script>parent.location='builders.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['buildersEdit'])) 
{
	$builders_id=$_GET['builders_id'];
	$builder=$_POST['builders_name'];
	$builder_url=$_POST['builders_url'];
	$builder_logo=$_FILES['builders_logo']['name'];

	$ongoingProject=$_POST['ongoing_projects'];
	$about_group=addslashes($_POST['about_group']);

	if (empty($builder_logo)) {
		$update_query=mysqli_query($db_connect,"UPDATE  builders_list SET builders_name='$builder',builders_url='$builder_url',completed_projects='$ongoingProject',about_group='$about_group' WHERE builders_id='$builders_id' ");
		
		if ($update_query) 
		{
			echo "<script>alert('Builder Updated Successfully')</script>";
			echo "<script>parent.location='builders.php'</script>";
		}
	}
	else if (!empty($builder_logo)) {
		move_uploaded_file($_FILES['builders_logo']['tmp_name'], "files_uploads/".basename($_FILES['builders_logo']['name']));
		$update_query=mysqli_query($db_connect,"UPDATE  builders_list SET builders_name='$builder',builders_url='$builder_url',builders_logo='$builder_logo', completed_projects='$ongoingProject',about_group='$about_group' WHERE builders_id='$builders_id' ");
		
		if ($update_query) 
		{
			echo "<script>alert('Builder Updated Successfully')</script>";
			echo "<script>parent.location='builders.php'</script>";
		}
	}
	
}
// -------End Builders Add/Edit-----

// ------Bed Rooms Add/Edit-----------
if (isset($_POST['bedRoomAdd'])) {
	$bhkName=$_POST['bed_rooms_name'];
	$bhkUrl=str_replace(' ', '-', strtolower($_POST['bed_rooms_url']));
	$bhkDescription = addslashes($_POST['bed_rooms_description']);
	$insert_query=mysqli_query($db_connect,"INSERT INTO bed_rooms (bed_rooms_name, bed_rooms_url, bed_rooms_description) VALUES('$bhkName', '$bhkUrl', '$bhkDescription')");
	if ($insert_query) {
		echo "<script>alert('Bed Rooms Added Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
	else{
		echo mysqli_error($db_connect);
	}
}
if (isset($_POST['bedRoomEdit'])) {
	$bedRoomId=$_GET['bed_rooms_id'];
	$bhkName=$_POST['bed_rooms_name'];
	$bhkUrl=str_replace(' ', '-', strtolower($_POST['bed_rooms_url']));
	$bhkDescription = addslashes($_POST['bed_rooms_description']);
	$update_query=mysqli_query($db_connect,"UPDATE bed_rooms SET bed_rooms_name ='$bhkName', bed_rooms_url='$bhkUrl', bed_rooms_description='$bhkDescription' WHERE bed_rooms_id ='$bedRoomId'");
	if ($update_query) {
		echo "<script>alert('Bed Room Updated Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
}
// -------End Bed Rooms Add/Edit------

// ------Unit Types Add/Edit-------
if (isset($_POST['unitsAdd'])) {
	$unti_types_name=$_POST['unti_types_name'];
	$insert_query=mysqli_query($db_connect,"INSERT INTO unit_types (unti_types_name) VALUES('$unti_types_name')");
	if ($insert_query) {
		echo "<script>alert('Units Type Added Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
}
if (isset($_POST['unitsEdit'])) {
	$units_id=$_GET['units_id'];
	$unti_types_name=$_POST['unti_types_name'];
	$update_query=mysqli_query($db_connect,"UPDATE unit_types SET unti_types_name ='$unti_types_name' WHERE unit_types_id ='$units_id'");
	if ($update_query) {
		echo "<script>alert('Units Type Updated Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
}
// ------End Types Add/Edit--------

// --------File Types Add/Edit-----
if (isset($_POST['fileAdd'])) {
	$file_name=$_POST['file_name'];
	$insert_query=mysqli_query($db_connect,"INSERT INTO file_types (file_name) VALUES('$file_name')");
	if ($insert_query) {
		echo "<script>alert('File Type Added Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
}
if (isset($_POST['fileEdit'])) {
	$fileId=$_GET['file_id'];
	$file_name=$_POST['file_name'];
	$insert_query=mysqli_query($db_connect,"UPDATE file_types SET file_name = '$file_name' WHERE file_id='$fileId' ");
	if ($insert_query) {
		echo "<script>alert('File Type Updated Successfully')</script>";
		echo "<script>parent.location='types.php'</script>";
	}
}
// --------End File Types Add/Edit------

// --------Property Types Add/Edit------
if (isset($_POST['propertyTypes_Add'])) {
	$propertyTypes=$_POST['property_types_name'];
	$propertyTypesUrl=str_replace(' ', '-', strtolower($_POST['property_types_url']));
	$propertyTypesDescription=addslashes($_POST['property_types_description']);
	$insert_query=mysqli_query($db_connect,"INSERT INTO property_types(property_types_name, property_types_url, property_types_description)VALUES('$propertyTypes', '$propertyTypesUrl', '$propertyTypesDescription')");
	if ($insert_query) {
		echo "<script>alert('Property Type Added Successfully')</script>";
		echo "<script>parent.location='propertystaus.php'</script>";
	}
}
if (isset($_POST['propertyTypes_Edit'])) {
	$property_type_id=$_GET['property_types_id'];

	$propertyTypes=$_POST['property_types_name'];
	$propertyTypesUrl=str_replace(' ', '-', strtolower($_POST['property_types_url']));
	$propertyTypesDescription=addslashes($_POST['property_types_description']);

	$update_query=mysqli_query($db_connect,"UPDATE property_types SET property_types_name='$propertyTypes', property_types_url='$propertyTypesUrl', property_types_description='$propertyTypesDescription' WHERE property_types_id='$property_type_id'");
	if ($update_query) {
		echo "<script>alert('Property Type Updated Successfully')</script>";
		echo "<script>parent.location='propertystaus.php'</script>";
	}
}
// --------End Property Types Add/Edit---

// ------Property Status Add/Edit-------
if (isset($_POST['propertyStaus_Add'])) {
	$statusName=$_POST['property_status_name'];
	$statusUrl=str_replace(' ', '-', strtolower($_POST['property_status_url']));
	$statusDescription=addslashes($_POST['property_status_description']);
	$insert_query=mysqli_query($db_connect,"INSERT INTO property_status(property_status_name, property_status_url, property_status_description)VALUES('$statusName', '$statusUrl', '$statusDescription')");
	if ($insert_query) {
		echo "<script>alert('Property Status Added Successfully')</script>";
		echo "<script>parent.location='propertystaus.php'</script>";
	}
	else{echo "Error".mysqli_error($db_connect);}
}
if (isset($_POST['propertyStaus_Edit'])) {
	$statusId=$_GET['property_status_id'];
	$statusName=$_POST['property_status_name'];
	$statusUrl=str_replace(' ', '-', strtolower($_POST['property_status_url']));
	$statusDescription=addslashes($_POST['property_status_description']);
	$insert_query=mysqli_query($db_connect,"UPDATE property_status SET property_status_name='$statusName', property_status_url='$statusUrl', property_status_description='$statusDescription' WHERE property_status_id='$statusId' ");
	if ($insert_query) {
		echo "<script>alert('Property Status Updated Successfully')</script>";
		echo "<script>parent.location='propertystaus.php'</script>";
	}
}
// ------End Property Status Add/Edit---

// -----Projects Add/Edit---
if (isset($_POST['projectAdd'])) {
	$builders=addslashes($_POST['builders_name']);
	$project=addslashes($_POST['project_name']);
	$country=addslashes($_POST['country']);
	$state=addslashes($_POST['state']);
	$city=addslashes($_POST['city']);
	$area=addslashes($_POST['area']);
	$location=addslashes($_POST['project_location']);
	$unit_types=addslashes($_POST['unit_types']);
	$price=addslashes($_POST['price']);
	$total_units=addslashes($_POST['total_units']);
	$total_land_area=addslashes($_POST['total_land_area']);
	$blocks_towers=addslashes($_POST['blocks_towers']);
	$possesion_date=addslashes($_POST['possesion_date']);
	$propertyType=addslashes($_POST['propertyType']);
	$propertyStaus=addslashes($_POST['propertyStatus']);
	$about=addslashes($_POST['about_project']);
	$banner_img=$_FILES['banner_image']['name'];
	$videoLink=addslashes($_POST['video_link']);
	$created_date=date("Y-m-d H:i:s");
	$projectMetaKeyword=addslashes($_POST['meta_keywords']);
	$projectMetaDescription=addslashes($_POST['meta_description']);
	if (empty($projectMetaDescription)) {
		$projectMetaDescription = "$project is an upcoming project in the location of  $location.  Get $project Brochure, Floorplan & Masterplan, Pricesheet.";
	}
	$views=addslashes($_POST['no_of_views']);
	$target="banner_image_uploads/";
	$target_path=$target.basename($_FILES['banner_image']['name']);

	if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $target_path))     
	{
		$insert_query=mysqli_query($db_connect,"INSERT INTO project_detail(builders_id, project_name, country_id, state_id, city_id, area_id, project_location, unit_types_id, price, total_land_area, total_units, blocks_towers, possesion_date, about_project, property_types_id, property_status_id, banner_image, video_link, meta_keywords, meta_description, no_of_views, created_date) VALUES ('$builders','$project','$country','$state','$city','$area','$location','$unit_types','$price','$total_land_area','$total_units','$blocks_towers','$possesion_date','$about','$propertyType','$propertyStaus','$banner_img', '$videoLink', '$projectMetaKeyword', '$projectMetaDescription', '$views', now())");
		
		if ($insert_query) 
		{
			echo "<script>alert('New Project Detail Added Successfully')</script>";
			echo "<script>parent.location='projects.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}

		
	}
	else{
		echo "<script>alert('Error While Image Uploading..')</script>";
	}
}

if (isset($_POST['projectEdit'])) {
	$project_id=$_GET['project_id'];

	$builders=addslashes($_POST['builders_name']);
	$project=addslashes($_POST['project_name']);
	$country=addslashes($_POST['country']);
	$state=addslashes($_POST['state']);
	$city=addslashes($_POST['city']);
	$area=addslashes($_POST['area']);
	$location=addslashes($_POST['project_location']);
	$unit_types=addslashes($_POST['unit_types']);
	$price=addslashes($_POST['price']);
	$total_units=addslashes($_POST['total_units']);
	$total_land_area=addslashes($_POST['total_land_area']);
	$blocks_towers=addslashes($_POST['blocks_towers']);
	$possesion_date=addslashes($_POST['possesion_date']);
	$propertyType=addslashes($_POST['propertyType']);
	$propertyStaus=addslashes($_POST['propertyStatus']);
	$about=addslashes($_POST['about_project']);
	$banner_img=$_FILES['banner_image']['name'];
	$videoLink=addslashes($_POST['video_link']);
	$created_date=date("Y-m-d H:i:s");
	$projectMetaKeyword=addslashes($_POST['meta_keywords']);
	$projectMetaDescription=addslashes($_POST['meta_description']);
	if (empty($projectMetaDescription)) {
		$projectMetaDescription = "$project is an upcoming project in the location of  $location.  Get $project Brochure, Floorplan & Masterplan, Pricesheet.";
	}
	$views=addslashes($_POST['no_of_views']);
	$target="banner_image_uploads/";
	$target_path=$target.basename($_FILES['banner_image']['name']);

	if ($banner_img) {
		if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $target_path))     
		{
			$update_query=mysqli_query($db_connect,"UPDATE project_detail SET builders_id='$builders',project_name='$project',country_id='$country',state_id='$state',city_id='$city',area_id='$area',project_location='$location',unit_types_id='$unit_types',price='$price',total_land_area='$total_land_area',total_units='$total_units',blocks_towers='$blocks_towers',possesion_date='$possesion_date',about_project='$about',property_types_id='$propertyType',property_status_id='$propertyStaus',banner_image='$banner_img', video_link='$videoLink', meta_keywords='$projectMetaKeyword', meta_description='$projectMetaDescription', no_of_views='$views', created_date=now() WHERE project_id='$project_id'");

			if ($update_query) 
			{
				echo "<script>alert('Project Updated Successfully')</script>";
				echo "<script>parent.location='projects.php'</script>";
			}
			else{
				echo "Error".mysqli_error($db_connect);
			}


		}
		else{
			echo "<script>alert('Error While Image Uploading..')</script>";
		}
	}
	else{
		$update_query=mysqli_query($db_connect,"UPDATE project_detail SET builders_id='$builders',project_name='$project',country_id='$country',state_id='$state',city_id='$city',area_id='$area',project_location='$location',unit_types_id='$unit_types',price='$price',total_land_area='$total_land_area',total_units='$total_units',blocks_towers='$blocks_towers',possesion_date='$possesion_date',about_project='$about',property_types_id='$propertyType',property_status_id='$propertyStaus', video_link='$videoLink', meta_keywords='$projectMetaKeyword', meta_description='$projectMetaDescription', no_of_views='$views', created_date=now() WHERE project_id='$project_id'");

		if ($update_query) 
		{
			echo "<script>alert('Project Updated Successfully')</script>";
			echo "<script>parent.location='projects.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}
// -----End Projects Add/Edit---

// ---------Price Sheet Add/Edit----------
if (isset($_POST['priceSheetAdd'])) {

	for ($i=0; $i <count($_POST['units_type']); $i++) { 

		$insert_query=mysqli_query($db_connect,"INSERT INTO price_sheet(project_id,unit_types_id,sqft,price_amount)VALUES('".$_POST['project_name']."','".$_POST['units_type'][$i]."','".$_POST['sqft'][$i]."','".$_POST['price_amount'][$i]."')");
		if ($insert_query) 
		{
			echo "<script>alert('Price Sheet Added Successfully')</script>";
			echo "<script>parent.location='price_sheet.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['priceSheetEdit'])) {
	
	for ($i=0; $i <count($_POST['price_sheet_id']); $i++) { 

		$update_query=mysqli_query($db_connect,"UPDATE price_sheet SET project_id='".$_POST['project_name']."',unit_types_id='".$_POST['units_type'][$i]."',sqft='".$_POST['sqft'][$i]."',price_amount='".$_POST['price_amount'][$i]."'
			WHERE price_sheet_id='".$_POST['price_sheet_id'][$i]."'");
		if ($update_query) 
		{
			echo "<script>alert('Price Sheet Updated Successfully')</script>";
			echo "<script>parent.location='price_sheet.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}
// ---------End Price Sheet Add/Edit------

// ---------Unit Configuration Add/Edit------
if (isset($_POST['unitConfigAdd'])) {
	$file_name = $_FILES['floor_plan']['name'];
	$file_tmp = $_FILES['floor_plan']['tmp_name'];

	for ($i=0; $i <count($_POST['units_type']) ; $i++) {
		move_uploaded_file($file_tmp[$i],"files_uploads/".$file_name[$i]); 
		$insert_query=mysqli_query($db_connect,"INSERT INTO unit_configuration(project_id,unit_types_id,super_builtup_area,carpet_area,floor_plan)VALUES('".$_POST['project_name']."','".$_POST['units_type'][$i]."','".$_POST['super_builtup_area'][$i]."','".$_POST['carpet_area'][$i]."','".$file_name[$i]."')");

		if ($insert_query) {
			echo "<script>alert('Units Configuration Added Successfully')</script>";
			echo "<script>parent.location='units_config.php'</script>";

		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['unitConfigEdit'])) {

	$project_name=$_POST['project_name'];
	$unitsTypes=$_POST['units_type'];
	$superBuiltupArea=$_POST['super_builtup_area'];
	$carpetArea=$_POST['carpet_area'];

	$file_name = $_FILES['floor_plan']['name'];
	
	$file_tmp = $_FILES['floor_plan']['tmp_name'];
	//print_r($file_name); 	
	//echo sizeof($file_name);
	//exit();
	for ($i=0; $i <count($_POST['unit_configuration_id']) ; $i++) {
		if (!empty($file_name[$i])) {
			move_uploaded_file($file_tmp[$i], "files_uploads/".$file_name[$i]);
			$update_query=mysqli_query($db_connect,"
				UPDATE unit_configuration 
				SET project_id='".$project_name."',unit_types_id='".$unitsTypes[$i]."',super_builtup_area='".$superBuiltupArea[$i]."',carpet_area='".$carpetArea[$i]."', floor_plan='".$file_name[$i]."' WHERE unit_configuration_id='".$_POST['unit_configuration_id'][$i]."' ");

			if ($update_query) {
				echo "<script>alert('Units Configuration Updeated Successfully')</script>";
				echo "<script>parent.location='units_config.php'</script>";

			}
			else{
				echo "Error".mysqli_error($db_connect);
			}
		}
		else {
			
			$update_query=mysqli_query($db_connect,"
				UPDATE unit_configuration 
				SET project_id='".$project_name."',unit_types_id='".$unitsTypes[$i]."',super_builtup_area='".$superBuiltupArea[$i]."',carpet_area='".$carpetArea[$i]."' WHERE unit_configuration_id='".$_POST['unit_configuration_id'][$i]."' ");

			if ($update_query) {
				echo "<script>alert('Units Configuration Updeated Successfully')</script>";
				echo "<script>parent.location='units_config.php'</script>";

			}
			else{
				echo "Error".mysqli_error($db_connect);
			}
			
		}

	}
	
	

	
}
// ---------End Unit Configuration Add/Edit------

// ------Images(File) Uploads Add/Edit-------
if (isset($_POST['imagesAdd'])) {
	$file_name = $_FILES['uploadfiles']['name'];
	$file_tmp = $_FILES['uploadfiles']['tmp_name'];
	for ($i=0; $i < count($_POST['file_types']); $i++) {

		move_uploaded_file($file_tmp[$i],"files_uploads/".$file_name[$i]); 
		$insert_query=mysqli_query($db_connect,"INSERT INTO files_detail(project_id,file_id,files)VALUES('".$_POST['project_name']."','".$_POST['file_types'][$i]."','".$file_name[$i]."')");
	}
	if ($insert_query) {
		echo "<script>alert('New Files Added Successfully')</script>";
		echo "<script>parent.location='uploads.php'</script>";

	}
	else{
		echo "Error".mysqli_error($db_connect);
	}
}

if (isset($_POST['imagesEdit'])) {
	$file_name = $_FILES['uploadfiles']['name'];
	$file_tmp = $_FILES['uploadfiles']['tmp_name'];
	for ($i=0; $i < count($_POST['files_detail_id']); $i++) {
		if (!empty($file_name[$i])) {
			move_uploaded_file($file_tmp[$i],"files_uploads/".$file_name[$i]);
			$update_query=mysqli_query($db_connect,"UPDATE files_detail SET project_id='".$_POST['project_name']."',file_id='".$_POST['file_types'][$i]."',files='".$file_name[$i]."' WHERE files_detail_id='".$_POST['files_detail_id'][$i]."'"); 
			if ($update_query) {
				echo "<script>alert('Files Updated Successfully')</script>";
				echo "<script>parent.location='uploads.php'</script>";

			}
			else{
				echo "Error".mysqli_error($db_connect);
			}
		}
		else{
			$update_query=mysqli_query($db_connect,"UPDATE files_detail SET project_id='".$_POST['project_name']."',file_id='".$_POST['file_types'][$i]."' WHERE files_detail_id='".$_POST['files_detail_id'][$i]."'"); 
			if ($update_query) {
				echo "<script>alert('Files Updated Successfully')</script>";
				echo "<script>parent.location='uploads.php'</script>";

			}
			else{
				echo "Error".mysqli_error($db_connect);
			}
		}
		
		
	}
	
}
// ------End Images Uploads----------

// -----------Amenities Add/Edit--------
if (isset($_POST['amenitiesAdd'])) {
	for ($i=0; $i <count($_POST['amenitiesName']) ; $i++) { 
		$insert_query=mysqli_query($db_connect,"INSERT INTO amenities(project_id,amenities_name)VALUES('".$_POST['project_name']."','".$_POST['amenitiesName'][$i]."')");
		if ($insert_query) {
			echo "<script>alert('New Amenities Added Successfully')</script>";
			echo "<script>parent.location='amenities.php'</script>";

		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['amenitiesEdit'])) {
	for ($i=0; $i <count($_POST['amenities_id']) ; $i++) { 
		$update_query=mysqli_query($db_connect,"UPDATE amenities SET project_id='".$_POST['project_name']."',amenities_name='".$_POST['amenitiesName'][$i]."' WHERE amenities_id='".$_POST['amenities_id'][$i]."' ");
		if ($update_query) {
			echo "<script>alert('Amenities Updated Successfully')</script>";
			echo "<script>parent.location='amenities.php'</script>";

		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}
// ---------End Amenities Add/Edit-------

// -----------Specifications Add/Edit---------
if (isset($_POST['specificationAdd'])) {
	for ($i=0; $i <count($_POST['specification_name']) ; $i++) { 
		$insert_query=mysqli_query($db_connect,"INSERT INTO specifications(project_id,specification_name,description)VALUES('".$_POST['project_name']."','".$_POST['specification_name'][$i]."','".$_POST['specification_description'][$i]."')");
		if ($insert_query) {
			echo "<script>alert('New Specifications Added Successfully')</script>";
			echo "<script>parent.location='amenities.php'</script>";

		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['specificationEdit'])) {
	for ($i=0; $i <count($_POST['specifications_id']) ; $i++) { 
		$update_query=mysqli_query($db_connect,"UPDATE specifications SET project_id='".$_POST['project_name']."',specification_name='".$_POST['specification_name'][$i]."',description='".$_POST['specification_description'][$i]."' WHERE specifications_id='".$_POST['specifications_id'][$i]."'");
		if ($update_query) {
			echo "<script>alert('Specifications Updated Successfully')</script>";
			echo "<script>parent.location='amenities.php'</script>";

		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}
// ---------End Specifications Add/Edit-------

// -------Maps Add/Edit---------
if (isset($_POST['mapsAdd'])) 
{
	for ($i=0; $i <count($_POST['project_name']) ; $i++) {

		$insert_query=mysqli_query($db_connect,"INSERT INTO location_detail(project_id,lat,lng)VALUES('".$_POST['project_name'][$i]."','".$_POST['lat'][$i]."','".$_POST['lng'][$i]."')");
		if ($insert_query) {
			echo "<script>alert('Location Added Successfully')</script>";
			echo "<script>parent.location='maps.php'</script>";

		}
	}
}

if (isset($_POST['mapsEdit'])) 
{
	$update_query=mysqli_query($db_connect,"UPDATE location_detail SET project_id='".$_POST['project_name']."',lat='".$_POST['lat']."',lng='".$_POST['lng']."' WHERE location_id='".$_POST['location_id']."'");
	if ($update_query) {
		echo "<script>alert('Location Updated Successfully')</script>";
		echo "<script>parent.location='maps.php'</script>";
	}
}

// -------End Maps Add/Edit---------

// --------Projects Price Range Add/Edit--
if (isset($_POST['projectPriceAdd'])) {
	$project_id=$_POST['project_name'];
	$projectPriceRange=count($_POST['projects_price']);
	for ($i=0; $i <$projectPriceRange ; $i++) { 
		$insert_query=mysqli_query($db_connect,"INSERT INTO projects_price_range(project_id,price_range_id)VALUES('$project_id','".$_POST['projects_price'][$i]."')");
		if ($insert_query) {
			echo "<script>alert('Projects Price Range Added Successfully')</script>";
			echo "<script>parent.location='price_range.php'</script>";
		}
	}
}

if (isset($_POST['projectPriceEdit'])) {
	$project_id=$_POST['project_name'];
	$projectPriceRange=count($_POST['projects_price']);
	for ($i=0; $i <$projectPriceRange ; $i++) { 
		$update_query=mysqli_query($db_connect,"UPDATE projects_price_range SET project_id='$project_id',price_range_id='".$_POST['projects_price'][$i]."' WHERE projects_price_range_id='".$_POST['projects_price_range_id'][$i]."'");
		if ($update_query) {
			echo "<script>alert('Projects Price Range Updated Successfully')</script>";
			echo "<script>parent.location='price_range.php'</script>";
		}
	}
}
// --------End Projects Price Range-------

// -------Price Range Add/Edit------
if (isset($_POST['priceRangeAdd'])) 
{	
	$priceRange=count($_POST['price_range']);

	for ($i=0; $i <$priceRange ; $i++) { 
		$insert_query=mysqli_query($db_connect,"INSERT INTO price_range(price_range_name)VALUES('".$_POST['price_range'][$i]."')");
		if ($insert_query) {
			echo "<script>alert('Price Range Added Successfully')</script>";
			echo "<script>parent.location='price_range.php'</script>";
		}
	}
}

if (isset($_POST['priceRangeEdit'])) 
{	
	$price_range_id=$_GET['price_range_id'];
	$priceRange=$_POST['price_range'];

	$update_query=mysqli_query($db_connect,"UPDATE price_range SET price_range_name='$priceRange' WHERE price_range_id='$price_range_id'");
	if ($update_query) {
		echo "<script>alert('Price Range Updated Successfully')</script>";
		echo "<script>parent.location='price_range.php'</script>";
	}
	else{
		echo "Error".mysqli_error($db_connect);
	}
	
}
// -------End Price Range Add/Edit--

// -------Country State City Area Add/Edit-------
if (isset($_POST['countryAdd'])) {
	$countryName=$_POST['country_name'];
	$countryUrl=str_replace(' ', '-', strtolower($_POST['country_url']));
	$countryDescription=addslashes($_POST['country_description']);
	$insert_query=mysqli_query($db_connect,"INSERT INTO country(country_name, country_url, country_description)VALUES('$countryName', '$countryUrl', '$countryDescription')");
	if ($insert_query) {
		echo "<script>alert('Country Added Successfully')</script>";
		echo "<script>parent.location='location_detail.php'</script>";
	}
	else{
		echo "Error".mysqli_error($db_connect);
	}
}

if (isset($_POST['countryEdit'])) {
	$countryId=$_GET['country_id'];
	$countryName=$_POST['country_name'];
	$countryUrl=str_replace(' ', '-', strtolower($_POST['country_url']));
	$countryDescription=addslashes($_POST['country_description']);
	$update_query=mysqli_query($db_connect,"UPDATE country SET country_name = '$countryName', country_url = '$countryUrl', country_description = '$countryDescription' WHERE country_id='$countryId'");
	if ($update_query) {
		echo "<script>alert('Country Updated Successfully')</script>";
		echo "<script>parent.location='location_detail.php'</script>";
	}
	else{
		echo "Error".mysqli_error($db_connect);
	}
}

if (isset($_POST['stateAdd'])) {
	$countryName=$_POST['country_name'];
	$stateName=count($_POST['state_name']);
	// $stateUrl=$_POST['state_url'];
	// $stateDescription=$_POST['state_description'];
	$stateBanner=$_FILES['state_banner']['name'];
	$bannerTempName=$_FILES['state_banner']['tmp_name'];

	for ($i=0; $i < $stateName; $i++) {
		move_uploaded_file($bannerTempName[$i], "banner_image_uploads/".$stateBanner[$i]);
		
		$insert_query=mysqli_query($db_connect,"INSERT INTO state(state_name, state_url, state_description, country_id, state_banner)VALUES('".$_POST['state_name'][$i]."', '".str_replace(' ', '-', strtolower($_POST['state_url'][$i]))."', '".addslashes($_POST['state_description'][$i])."', '$countryName','".$stateBanner[$i]."')");
		if ($insert_query) {
			echo "<script>alert('State Added Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['stateEdit'])) {
	$state_Id=$_GET['state_id'];
	$countryName=$_POST['country_name'];
	$stateName=$_POST['state_name'];
	$stateUrl=str_replace(' ', '-', strtolower($_POST['state_url']));
	$stateDescription=addslashes($_POST['state_description']);

	$stateBanner=$_FILES['state_banner']['name'];
	$bannerTempName=$_FILES['state_banner']['tmp_name'];

	if ($stateBanner) {
		move_uploaded_file($bannerTempName, "banner_image_uploads/".$stateBanner);
		
		$update_query=mysqli_query($db_connect,"UPDATE state SET state_name='$stateName', state_url='$stateUrl', state_description='$stateDescription', country_id='$countryName', state_banner='$stateBanner' WHERE state_id='$state_Id'");
		if ($update_query) {
			echo "<script>alert('State Update Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
	else{
		$update_query=mysqli_query($db_connect,"UPDATE state SET state_name='$stateName', state_url='$stateUrl', state_description='$stateDescription', country_id='$countryName' WHERE state_id='$state_Id'");
		if ($update_query) {
			echo "<script>alert('State Updated Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['cityAdd'])) {
	$stateName=$_POST['state_name'];
	$cityName=count($_POST['city_name']);

	$cityBanner=$_FILES['city_banner']['name'];
	$bannerTempName=$_FILES['city_banner']['tmp_name'];
	$aboutCity = $_POST['about_city'];
	$cityUrl = $_POST['city_url'];

	for ($i=0; $i < $cityName; $i++) {
		move_uploaded_file($bannerTempName[$i], "banner_image_uploads/".$cityBanner[$i]);
		
		$insert_query=mysqli_query($db_connect,"INSERT INTO city(city_name, state_id, city_banner, city_description, city_url)VALUES('".$_POST['city_name'][$i]."','$stateName','".$cityBanner[$i]."', '".addslashes($aboutCity[$i])."', '".str_replace(' ', '-', $cityUrl[$i])."')");
		if ($insert_query) {
			echo "<script>alert('City Added Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['cityEdit'])) {
	$cityId=$_GET['city'];
	$stateName=$_POST['state_name'];
	$cityName=$_POST['city_name'];

	$cityBanner=$_FILES['city_banner']['name'];
	$bannerTempName=$_FILES['city_banner']['tmp_name'];
	$aboutCity = addslashes($_POST['about_city']);
	$cityUrl = $_POST['city_url'];

	if ($cityBanner) {
		move_uploaded_file($bannerTempName, "banner_image_uploads/".$cityBanner);
		
		$update_query=mysqli_query($db_connect,"UPDATE city SET city_name='$cityName',state_id='$stateName',city_banner='$cityBanner', city_description='$aboutCity', city_url = '$cityUrl' WHERE city_id='$cityId'");
		if ($update_query) {
			echo "<script>alert('City Update Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
	else{
		$update_query=mysqli_query($db_connect,"UPDATE city SET city_name='$cityName',state_id='$stateName', city_description='$aboutCity', city_url = '$cityUrl' WHERE city_id='$cityId'");
		if ($update_query) {
			echo "<script>alert('City Updated Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}


if (isset($_POST['areaAdd'])) {
	$cityName=$_POST['city_name'];
	$areaName=count($_POST['area_name']);
	$areaUrl=$_POST['area_url'];
	$areaDescription=$_POST['area_description'];
	$areaBanner=$_FILES['area_banner']['name'];
	$bannerTempName=$_FILES['area_banner']['tmp_name'];

	for ($i=0; $i < $areaName; $i++) {
		if ($areaBanner) {
			move_uploaded_file($bannerTempName[$i], "banner_image_uploads/".$areaBanner[$i]);
		}
		else if (!$areaBanner){

		}
		
		
		$insert_query=mysqli_query($db_connect,"INSERT INTO area(area_name, area_url, area_description, city_id, area_banner)VALUES('".$_POST['area_name'][$i]."', '".str_replace(' ', '-', strtolower($areaUrl[$i]))."', '".addslashes($areaDescription[$i])."', '$cityName', '".$areaBanner[$i]."')");
		if ($insert_query) {
			echo "<script>alert('Area Added Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['areaEdit'])) {
	$areaId=$_GET['area'];
	$cityName=$_POST['city_name'];
	$areaName=$_POST['area_name'];
	$areaUrl=str_replace(' ', '-', strtolower($_POST['area_url']));
	$areaDescription=addslashes($_POST['area_description']);
	$areaBanner=$_FILES['area_banner']['name'];
	$bannerTempName=$_FILES['area_banner']['tmp_name'];

	if ($areaBanner) {
		move_uploaded_file($bannerTempName, "banner_image_uploads/".$areaBanner);
		
		$update_query=mysqli_query($db_connect,"UPDATE area SET area_name='$areaName', area_url='$areaUrl', area_description='$areaDescription', city_id='$cityName', area_banner='$areaBanner' WHERE area_id='$areaId'");
		if ($update_query) {
			echo "<script>alert('Area Update Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
	else{
		$update_query=mysqli_query($db_connect,"UPDATE area SET area_name='$areaName', area_url='$areaUrl', area_description='$areaDescription', city_id='$cityName' WHERE area_id='$areaId'");
		if ($update_query) {
			echo "<script>alert('Area Updated Successfully')</script>";
			echo "<script>parent.location='location_detail.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	}
}
// -------End Country State City Area Add/Edit---

// -------------Blog Add/Edit-----------
if (isset($_POST['blogAdd'])) {
	
	$project_name=$_POST['project_name'];
	$blog_title=str_replace("'", '', $_POST['blog_title']);
	$blog_url = str_replace(' ', '-', strtolower($_POST['blog_url']));
	$blog_content=str_replace("'", '', addslashes($_POST['blog_content']));
	$blog_banner=$_FILES['blog_banner']['name'];
	$blog_writer=$_POST['blog_writer'];

	$blogMetaKey = addslashes($_POST['blog_meta_key']);
	$blogMetaDesc = addslashes($_POST['blog_meta_desc']);

	$target="blog_banners_uploads/";
	$target_path=$target.basename($_FILES['blog_banner']['name']);

	if (move_uploaded_file($_FILES['blog_banner']['tmp_name'], $target_path)) {
		$insert_query=mysqli_query($db_connect,"INSERT INTO blogs(project_id,blog_title,blog_url,blog_content,blog_banner,blog_writer_name, blog_meta_key, blog_meta_desc, created)VALUES('$project_name','$blog_title','$blog_url','$blog_content','$blog_banner','$blog_writer', '$blogMetaKey', '$blogMetaDesc', now())");
		if ($insert_query) {
			echo "<script>alert('Blog Created Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error".mysqli_error($db_connect);
		}
	} 
}
if (isset($_POST['blogEdit'])) {
	$blogId=$_GET['blog_id'];
	$project_name=$_POST['project_name'];
	$blog_title=str_replace("'", '-', $_POST['blog_title']);
	$blog_url = str_replace(' ', '', strtolower($_POST['blog_url']));
	$blog_content=str_replace("'", '', addslashes($_POST['blog_content']));
	$blog_banner=$_FILES['blog_banner']['name'];
	$blog_writer=$_POST['blog_writer'];

	$blogMetaKey = addslashes($_POST['blog_meta_key']);
	$blogMetaDesc = addslashes($_POST['blog_meta_desc']);

	$target="blog_banners_uploads/";
	$target_path=$target.basename($_FILES['blog_banner']['name']);

	if ($blog_banner) {
		move_uploaded_file($_FILES['blog_banner']['tmp_name'], $target_path);
		$update_query=mysqli_query($db_connect,"UPDATE blogs SET project_id='$project_name',blog_title='$blog_title', blog_url='$blog_url', blog_content='$blog_content',blog_banner='$blog_banner',blog_writer_name='$blog_writer', blog_meta_key = '$blogMetaKey', blog_meta_desc = '$blogMetaDesc', created=now() WHERE blog_id='$blogId'");
		if ($update_query) {
			echo "<script>alert('Blog Updated Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error ".mysqli_error($db_connect);
		}
	}
	else{
		$update_query=mysqli_query($db_connect,"UPDATE blogs SET project_id='$project_name',blog_title='$blog_title', blog_url='$blog_url',blog_content='$blog_content',blog_writer_name='$blog_writer', blog_meta_key = '$blogMetaKey', blog_meta_desc = '$blogMetaDesc', created=now() WHERE blog_id='$blogId'");
		if ($update_query) {
			echo "<script>alert('Blog Updated Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error ".mysqli_error($db_connect);
		}

	}
}
// ------------End Blog Add/Edit--------

// -----------Advt Add/Edit-------------
if (isset($_POST['advtAdd'])) {
	$advtTitle=$_POST['advt_title'];
	$advtUrl=$_POST['advt_url'];
	$advtBanner=$_FILES['advt_banner']['name'];
	$target="advt_banners/";
	$target_path=$target.basename($_FILES['advt_banner']['name']);
	if ($advtBanner) {
		move_uploaded_file($_FILES['advt_banner']['tmp_name'], $target_path);
		$insert_query = mysqli_query($db_connect,"INSERT INTO advertisements (advt_title, advt_url, advt_banner, advt_created) VALUES ('$advtTitle', '$advtUrl', '$advtBanner', '$now')");
		if ($insert_query) {
			echo "<script>alert('Advertisement Added Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error ".mysqli_error($db_connect);
		}
	}
}

if (isset($_POST['advtEdit'])) {
	$advtID = $_GET['advt_id'];
	$advtTitle=$_POST['advt_title'];
	$advtUrl=$_POST['advt_url'];
	$advtBanner=$_FILES['advt_banner']['name'];
	$target="advt_banners/";
	$target_path=$target.basename($_FILES['advt_banner']['name']);
	if ($advtBanner) {
		move_uploaded_file($_FILES['advt_banner']['tmp_name'], $target_path);
		$update_query=mysqli_query($db_connect,"UPDATE advertisements SET advt_title='$advtTitle', advt_url='$advtUrl', advt_banner='$advtBanner', advt_updated='$now' WHERE advt_id='$advtID' ");
		if ($update_query) {
			echo "<script>alert('Advertisement Updated Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error ".mysqli_error($db_connect);
		}
	}
	else if (!$advtBanner) {
		$update_query=mysqli_query($db_connect,"UPDATE advertisements SET advt_title='$advtTitle', advt_url='$advtUrl', advt_updated='$now' WHERE advt_id='$advtID' ");
		if ($update_query) {
			echo "<script>alert('Advertisement Updated Successfully')</script>";
			echo "<script>parent.location='blogs.php'</script>";
		}
		else{
			echo "Error ".mysqli_error($db_connect);
		}
	}
}
// -----------End Advt Add/Edit---------

// ***************** Rcomonded ADD/EDIT *********
if (isset($_POST['saveRecomonded'])) {
	$recomonded = $_POST['recomondsProjects'];
	$countRecomonded = count($recomonded);
	for ($i=0; $i <$countRecomonded ; $i++) {
		$checkRecommonded=mysqli_query($db_connect,"SELECT project_id FROM recommended_properties WHERE project_id='".$recomonded[$i]."' ");
		if (mysqli_num_rows($checkRecommonded)>=1) {
			$selectProjects = mysqli_query($db_connect,"SELECT * FROM project_detail WHERE project_id='".$recomonded[$i]."' ");
			$row=mysqli_fetch_Array($selectProjects);
			$projectName = $row['project_name'];
			echo "<script>alert('$projectName is Already in Recommonded List')</script>";
		}
		else {
			$insert_query=mysqli_query($db_connect,"INSERT INTO recommended_properties (project_id,recommended_created) VALUES ('".$recomonded[$i]."','$now')");
			if ($insert_query) {
				echo "<script>alert('Recommonded Properties Added Successfully')</script>";
				echo "<script>parent.location='recomanded__recent_properties.php'</script>";
			}
		}
	}

}
// ***************** End Rcomonded ADD/EDIT *****
?>