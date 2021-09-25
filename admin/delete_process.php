<?php
include 'db_config.php';
if (!empty($_POST['builderId'])) {
	$builderId = $_POST['builderId'];
	$builderId = str_replace('builderId_', '', $builderId);
	$checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE builders_id = '$builderId' ");
	if (mysqli_num_rows($checkProject)>=1) {
		echo "This Builder Can't Be Delete It Has Some Projects";
	}
	else{
		$deleteBuilders = mysqli_query($db_connect, "DELETE FROM builders_list WHERE builders_id = '$builderId' ");
		if ($deleteBuilders) {
			echo "Builder Deleted";
		}
		else{
			echo "Error While Deleting ".mysqli_error($db_connect);
		}
	}	
}

if (!empty($_POST['bedRoomsId'])) {
	$bedRoomsId = $_POST['bedRoomsId'];
	$bedRoomsId = str_replace('bedRoomsId_', '', $bedRoomsId);
	$checkUnitConfigPriceSheet = mysqli_query($db_connect, "SELECT * FROM unit_configuration AS uc, price_sheet AS pc WHERE uc.unit_types_id=pc.unit_types_id AND uc.unit_types_id = '$bedRoomsId' OR pc.unit_types_id = '$bedRoomsId' ");
	if (mysqli_num_rows($checkUnitConfigPriceSheet)>=1) {
		echo "This Bed Room Can't Be Delete It Has Some Projects Unit Configuration OR Price Sheet";
	}
	else{
		$deleteBedRooms = mysqli_query($db_connect, "DELETE FROM bed_rooms WHERE bed_rooms_id = '$bedRoomsId' ");
		if ($deleteBedRooms) {
			echo "Bed Room Deleted";
		}
		else{
			echo "Error While Deleting ".mysqli_error($db_connect);
		}
	}	
}

if (!empty($_POST['unitTypeId'])) {
	$unitTypeId = $_POST['unitTypeId'];
	$unitTypeId = str_replace('unitTypesId_', '', $unitTypeId);
	$checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE unit_types_id = '$unitTypeId' ");
	if (mysqli_num_rows($checkProject)>=1) {
		echo "This Unit Type Can't Be Delete It Has Some Projects";
	}
	else{
		$deleteUnitType = mysqli_query($db_connect, "DELETE FROM unit_types WHERE unit_types_id = '$unitTypeId' ");
		if ($deleteUnitType) {
			echo "Unit Type Deleted";
		}
		else{
			echo "Error While Deleting ".mysqli_error($db_connect);
		}
	}	
}

if (!empty($_POST['fileTypeId'])) {
	$fileTypeId = $_POST['fileTypeId'];
	$fileTypeId = str_replace('fileTypesId_', '', $fileTypeId);
	$checkProject = mysqli_query($db_connect, "SELECT * FROM files_detail WHERE file_id = '$fileTypeId' ");
	if (mysqli_num_rows($checkProject)>=1) {
		echo "This File Type Can't Be Delete It Has Some Projects";
	}
	else{
		$delete = mysqli_query($db_connect, "DELETE FROM file_types WHERE file_id = '$fileTypeId' ");
		if ($delete) {
			echo "File Type Deleted";
		}
		else{
			echo "Error While Deleting ".mysqli_error($db_connect);
		}
	}	
}

if (!empty($_POST['propertyTypeId'])) {
  $propertyTypeId = $_POST['propertyTypeId'];
  $propertyTypeId = str_replace('propertyTypesId_', '', $propertyTypeId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE property_types_id = '$propertyTypeId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This Property Type Can't Be Delete It Has Some Projects";
  }
  else{
    $deletePropertyTypes = mysqli_query($db_connect, "DELETE FROM property_types WHERE property_types_id = '$propertyTypeId' ");
    if ($deletePropertyTypes) {
      echo "Property Type Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['propertyStatusId'])) {
  $propertyStatusId = $_POST['propertyStatusId'];
  $propertyStatusId = str_replace('propertyStatusId_', '', $propertyStatusId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE property_status_id = '$propertyStatusId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This Property Status Can't Be Delete It Has Some Projects";
  }
  else{
    $deletePropertyTypes = mysqli_query($db_connect, "DELETE FROM property_status WHERE property_status_id = '$propertyStatusId' ");
    if ($deletePropertyTypes) {
      echo "Property Status Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['priceRangeId'])) {
  $priceRangeId = $_POST['priceRangeId'];
  $priceRangeId = str_replace('priceRangeId_', '', $priceRangeId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM projects_price_range WHERE price_range_id = '$priceRangeId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This Price Range Can't Be Delete It Has Some Projects";
  }
  else{
    $deletePropertyTypes = mysqli_query($db_connect, "DELETE FROM price_range WHERE price_range_id = '$priceRangeId' ");
    if ($deletePropertyTypes) {
      echo "Price Range Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['countryId'])) {
  $countryId = $_POST['countryId'];
  $countryId = str_replace('countryId_', '', $countryId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE country_id = '$countryId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This Country Can't Be Delete It Has Some Projects";
  }
  else{
    $deleteState = mysqli_query($db_connect, "DELETE FROM country WHERE country_id = '$countryId' ");
    if ($deleteState) {
      echo "Country Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['stateId'])) {
  $stateId = $_POST['stateId'];
  $stateId = str_replace('stateId_', '', $stateId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE state_id = '$stateId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This State Can't Be Delete It Has Some Projects";
  }
  else{
    $deleteState = mysqli_query($db_connect, "DELETE FROM state WHERE state_id = '$stateId' ");
    if ($deleteState) {
      echo "State Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['cityId'])) {
  $cityId = $_POST['cityId'];
  $cityId = str_replace('cityId_', '', $cityId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE city_id = '$cityId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This City Can't Be Delete It Has Some Projects";
  }
  else{
    $deleteCity = mysqli_query($db_connect, "DELETE FROM city WHERE city_id = '$cityId' ");
    if ($deleteCity) {
      echo "City Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}

if (!empty($_POST['areaId'])) {
  $areaId = $_POST['areaId'];
  $areaId = str_replace('areaId_', '', $areaId);
  $checkProject = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE area_id = '$areaId' ");
  if (mysqli_num_rows($checkProject)>=1) {
    echo "This Area Can't Be Delete It Has Some Projects";
  }
  else{
    $deleteArea = mysqli_query($db_connect, "DELETE FROM area WHERE area_id = '$areaId' ");
    if ($deleteArea) {
      echo "Area Deleted";
    }
    else{
      echo "Error While Deleting ".mysqli_error($db_connect);
    }
  } 
}


if (!empty($_POST['unitConfigId'])) {
	$unitConfigId = $_POST['unitConfigId'];
	$unitConfigId = str_replace('unitConfigId_', '', $unitConfigId);
	$deleteUnitConfig = mysqli_query($db_connect, "DELETE FROM unit_configuration WHERE unit_configuration_id = '$unitConfigId' ");
	if ($deleteUnitConfig) {
		echo "Row Deleted";
	}
	else{
		echo "Error While Deleting ".mysqli_error($db_connect);
	}
}

if (!empty($_POST['priceSheetId'])) {
	$priceSheetId = $_POST['priceSheetId'];
	$priceSheetId = str_replace('priceSheetId_', '', $priceSheetId);
	$deletePriceSheet = mysqli_query($db_connect, "DELETE FROM price_sheet WHERE price_sheet_id = '$priceSheetId' ");
	if ($deletePriceSheet) {
		echo "Row Deleted";
	}
	else{
		echo "Error While Deleting ".mysqli_error($db_connect);
	}
}

if (!empty($_POST['uploadedFilesId'])) {
	$uploadedFilesId = $_POST['uploadedFilesId'];
	$uploadedFilesId = str_replace('uploadedFilesId_', '', $uploadedFilesId);
	$deleteUploadedFile = mysqli_query($db_connect, "DELETE FROM files_detail WHERE files_detail_id = '$uploadedFilesId' ");
	if ($deleteUploadedFile) {
		echo "Row Deleted";
	}
	else{
		echo "Error While Deleting ".mysqli_error($db_connect);
	}
}

// echo "<script>alert('Unit Configuration Deleted ')</script>";
?>