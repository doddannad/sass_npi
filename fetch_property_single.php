<?php
// $url         = $_SERVER['REQUEST_URI'];
// $explode     = explode('/', $url);
// $host        = $explode[0];
// $cityUrl  = $explode[1];
// $areaUrl       = $explode[2];
// $project_Url        = $explode[3];

$project_Url = $_GET['project_name'];
// $project_Url = 'brigade-orchards';



$remove_minus = str_replace('-', ' ', $project_Url);
$remove_slash = str_replace('/', '', $remove_minus);

$project_name = $remove_slash;


// $project_id = '45';

$select_single_prject = mysqli_query($db_connect, "SELECT * FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps
  WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND project_name='$project_name' ");
if (mysqli_num_rows($select_single_prject) <= 0) {
} else {
}
$row = mysqli_fetch_array($select_single_prject);

$_SESSION['project_id'] = $row['project_id'];
$projectId = $row['project_id'];
$buildersId = $row['builders_id'];
$_SESSION['builders_id'] = $row['builders_id'];
$builders_url = $row['builders_url'];
$projectName = $row['project_name'];
$_SESSION['project_name'] = $row['project_name'];
$stateName = $row['state_name'];
$countryName = $row['country_name'];
$cityId = $row['city_id'];
$cityName = $row['city_name'];
$city_url = $row['city_url'];
$areaId = $row['area_id'];
$areaName = $row['area_name'];

$areaDescription = $row['area_description'];
$areaDescription = str_replace('&nbsp;', ' ', $areaDescription);
//   $areaDescription = preg_replace("/\s|&nbsp;/",' ',$areaDescription);
$areaDescription = $areaDescription;
// Use \n for newline on all systems
$areaDescription = preg_replace("/(\r\n|\n|\r)/", "\n", $areaDescription);
// Only allow two newlines in a row.
$areaDescription = preg_replace("/\n\n+/", "\n\n", $areaDescription);
// Put <p>..</p> around paragraphs
$areaDescription = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>", $areaDescription);
// Convert newlines not preceded by </p> to a <br /> tag
$areaDescription = preg_replace('|(?<!</p>)\s*\n|', "<br />", $areaDescription);
$areaDescription = strip_tags($areaDescription);


$location = $row['project_location'];
$unit_types = $row['unti_types_name'];
$propertyTypesId = $row['property_types_id'];
$propertyStatusId = $row['property_types_id'];
$propertyStatusName = $row['property_status_name'];
$propertyTypesName = $row['property_types_name'];
$propertyTypesUrl = $row['property_types_url'];

$price = $row['price'];
$land_area = $row['total_land_area'];
$total_units = $row['total_units'];
$blocks = $row['blocks_towers'];
$posseion = $row['possesion_date'];

$project_description = $row['about_project'];
$project_description = str_replace('&nbsp;', ' ', $project_description);
$project_description = $project_description;
// Use \n for newline on all systems
$project_description = preg_replace("/(\r\n|\n|\r)/", "\n", $project_description);
// Only allow two newlines in a row.
$project_description = preg_replace("/\n\n+/", "\n\n", $project_description);
// Put <p>..</p> around paragraphs
$project_description = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>", $project_description);
// Convert newlines not preceded by </p> to a <br /> tag
$project_description = preg_replace('|(?<!</p>)\s*\n|', "<br />", $project_description);
$project_description = strip_tags($project_description);
// $project_description = str_replace('.', '. <br/><br/>', $project_description);

$metaTitile = $row['project_name'] . ' | ' . $row['project_location'] . ' | ' . ' Brochure | Floorplan | Pricesheet | Reviews';
$metaKeyword = $row['meta_keywords'];
$metaDescription = $row['meta_description'];
if (empty($metaDescription)) {
  $metaDescription = $row['project_name'] . ' is an upcoming project in the location of ' . $row['project_location'] . ' Get ' . $row['project_name'] . ' Brochure, Floorplan & Masterplan, Pricesheet.';
}

$banner_image = $row['banner_image'];
$banner_Url = "admin/banner_image_uploads/" . $banner_image;
// $type = pathinfo($banner_Url, PATHINFO_EXTENSION);
// $data = file_get_contents($banner_Url);
// $banner_Url = 'data:image/' . $type . ';base64,' . base64_encode($data);


$mobile_banner_Url = "admin/banner_image_uploads/banner_mobile/" . $banner_image;
// $type = pathinfo($mobile_banner_Url, PATHINFO_EXTENSION);
// $data = file_get_contents($mobile_banner_Url);
// $mobile_banner_Url = 'data:image/' . $type . ';base64,' . base64_encode($data);

$buildersName = $row['builders_name'];
$buildersLogo = "admin/files_uploads/" . $row['builders_logo'];

$about_builder = $row['about_group'];
$about_builder = str_replace('&nbsp;', ' ', $about_builder);
$about_builder = $about_builder;
// Use \n for newline on all systems
$about_builder = preg_replace("/(\r\n|\n|\r)/", "\n", $about_builder);
// Only allow two newlines in a row.
$about_builder = preg_replace("/\n\n+/", "\n\n", $about_builder);
// Put <p>..</p> around paragraphs
$about_builder = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>", $about_builder);
// Convert newlines not preceded by </p> to a <br /> tag
$about_builder = preg_replace('|(?<!</p>)\s*\n|', "<br />", $about_builder);
$about_builder = strip_tags($about_builder);
// $about_builder = str_replace('.', '. <br/><br/>', $about_builder);
$projectUpdated = $row['created_date'];

// ====Start Gallery ======== 
$selectGallery = mysqli_query($db_connect, "
  SELECT * FROM files_detail AS fd,project_detail AS pd,file_types AS ft WHERE fd.project_id=pd.project_id AND fd.file_id=ft.file_id AND pd.project_name='$project_name' ");
$galleryArray = array();
while ($row = mysqli_fetch_array($selectGallery)) {
  $galleryArray[] = $row;
}
// ====Start Gallery ======== 
// ====Start Unit Configuration=======
$select_unit_configuration = mysqli_query($db_connect, "SELECT *, uc.unit_types_id AS unitsTypesId FROM unit_configuration AS uc,unit_types AS ut,project_detail AS pd WHERE uc.project_id=pd.project_id AND uc.unit_types_id=ut.unit_types_id AND pd.project_name='$project_name' ORDER BY uc.unit_types_id ");
$unit_configurations = array();
while ($row = mysqli_fetch_array($select_unit_configuration)) {
  $unit_configurations[] = $row;
}
// ====End Unit Configuration=====
// ==========Select Price Sheet========
$select_price = mysqli_query($db_connect, "SELECT * FROM price_sheet AS pc,project_detail AS pd, bed_rooms AS br WHERE pc.project_id=pd.project_id AND pc.unit_types_id=br.bed_rooms_id AND pd.project_name='$project_name' ");
$priceSheet = array();
while ($row = mysqli_fetch_array($select_price)) {
  $priceSheet[] = $row;
}
// =========End Price Sheet===========
// ======= Fetch Builder Similar Properties =======
$selectRelatedProjects = mysqli_query($db_connect, "
  SELECT *
  FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps
  WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND ct.city_id='$cityId' AND pd.builders_id = '$buildersId' AND pd.project_id!='$projectId' ORDER BY RAND()  ");

$relatedBuilderArray = array();
while ($row = mysqli_fetch_array($selectRelatedProjects)) {
  $relatedBuilderArray[] = $row;
}
// =======./ Fetch Builder Similar Properties =======

// ======= Fetch Property Similar Properties =======
$selectRelatedProjects = mysqli_query($db_connect, "
  SELECT *
  FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps
  WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND ct.city_id='$cityId' AND pd.project_id!='$projectId' AND ar.area_id = '$areaId' ORDER BY RAND()  ");

$relatedPropertyArray = array();
while ($row = mysqli_fetch_array($selectRelatedProjects)) {
  $relatedPropertyArray[] = $row;
}
// =======./ Fetch Property Similar Properties =======

// ############ SELECT FOOTERS ###########
// ---------Select Villa with BHK----
$bhkPropTypes = mysqli_query($db_connect, "
  SELECT pt.property_types_name, pt.property_types_url, br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url
  FROM project_detail AS pd, city AS ct, property_types AS pt, bed_rooms AS br
  WHERE pd.property_types_id=pt.property_types_id AND pd.city_id=ct.city_id AND pd.city_id='$cityId' AND pt.property_types_name!='Plot' GROUP BY pt.property_types_name, br.bed_rooms_name ORDER BY pt.property_types_id, br.bed_rooms_id ");
$bhkPropTypesArray = array();
while ($row = mysqli_fetch_array($bhkPropTypes)) {
  $bhkPropTypesArray[] = $row;
}
// ---------End-----

// -----Property Types & Status----
$propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url
  FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
  WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_name='$cityName' GROUP BY pt.property_types_name ");
$propertyTypesArray1 = array();
while ($row = mysqli_fetch_array($propertyTypes1)) {
  $propertyTypesArray1[] = $row;
}
$propertyStatus1 = mysqli_query($db_connect, "SELECT ps.property_status_name, ps.property_status_url, st.state_name, ct.city_name, ct.city_url
  FROM project_detail AS pd, property_status AS ps, state AS st, city AS ct
  WHERE pd.property_status_id=ps.property_status_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_name='$cityName' GROUP BY ps.property_status_name ");
$propertyStatusArray1 = array();
while ($row = mysqli_fetch_array($propertyStatus1)) {
  $propertyStatusArray1[] = $row;
}
// -----End Property Types & Status ---

//------Bed Rooms & Unit Types & File Types----
$select_bed_rooms = mysqli_query($db_connect, "
  SELECT br.bed_rooms_name, ct.city_name, br.bed_rooms_url, ct.city_url
  FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, city AS ct
  WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.city_id=ct.city_id AND ct.city_name='$cityName'  GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
$bedRoomsArray1 = array();
while ($row = mysqli_fetch_array($select_bed_rooms)) {
  $bedRoomsArray1[] = $row;
}

$fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct WHERE ar.city_id=ct.city_id AND ct.city_id='$cityId' ");
$cityWithAreaArray = array();
while ($row = mysqli_fetch_array($fetchCityWithArea)) {
  $cityWithAreaArray[] = $row;
}

// ############ ./ SELECT FOOTERS ###########


if (!empty($footer_builders_list)) {
  $ftRecBuildersArray = $footer_builders_list;
}

if (!empty($bedRoomsArray1)) {
  $ftRecBhkInCityArray = $bedRoomsArray1;
}
if (!empty($bhkPropTypesArray)) {
  $ftRecBhkWithPropTypesInCityArray = $bhkPropTypesArray;
}
if (!empty($propertyTypesArray1)) {
  $ftRecPropTypesInCityArray = $propertyTypesArray1;
}
if (!empty($cityWithAreaArray)) {
  $ftRecCityWithAreaArray = $cityWithAreaArray;
}
