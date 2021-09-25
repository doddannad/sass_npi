<?php
include 'db_config.php';
// SELECT area
$select_area = "SELECT * FROM area";
$areaArray = $db_connect->query($select_area);

// SELECT bed_rooms
$select_bed_rooms = "SELECT * FROM bed_rooms";
$bedRoomsArray = $db_connect->query($select_bed_rooms);

// SELECT blogs
$select_blogs = "SELECT * FROM blogs";
$blogsArray = $db_connect->query($select_blogs);

$select_limi_blogs = "SELECT * FROM blogs LIMIT 6";
$blogsLimitArray = $db_connect->query($select_limi_blogs);

// SELECT builders_list
$select_builders_list = "SELECT * FROM builders_list WHERE builders_id = '$builders_id' ";
$buildersArray = $db_connect->query($select_builders_list);

// SELECT city
$select_city = "SELECT * FROM project_detail AS pd,  city AS ct WHERE pd.city_id = ct.city_id AND pd.builders_id = '$builders_id' GROUP BY ct.city_id ";
$fetchedCity = $db_connect->query($select_city);
$cityArray = array();
foreach ($fetchedCity as $city) {
	$cityArray[] = $city;
}




// SELECT country
$select_country = "SELECT * FROM country";
$countryArray = $db_connect->query($select_country);

// SELECT file_types
$select_file_types = "SELECT * FROM file_types";
$fileTypesArray = $db_connect->query($select_file_types);

// SELECT price_range
$select_price_range = "SELECT * FROM price_range";
$priceRangeArray = $db_connect->query($select_price_range);

// SELECT project_detail
$select_projects = "SELECT * FROM project_detail";
$projectsArray = $db_connect->query($select_projects);

$select_latest_projects = "SELECT * FROM project_detail AS pd, country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND pd.builders_id = '$builders_id' ORDER BY created_date DESC LIMIT 12";
$latestProjectsArray = $db_connect->query($select_latest_projects);

$select_hot_projects = "SELECT * FROM project_detail AS pd, country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND pd.builders_id = '$builders_id' ORDER BY RAND() LIMIT 12";
$hotProjectsArray = $db_connect->query($select_hot_projects);

$select_featured_projects = "SELECT * FROM recommended_properties AS rcm, project_detail AS pd,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE rcm.project_id=pd.project_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND pd.builders_id = '$builders_id' ";
$featuredProjectsArray = $db_connect->query($select_featured_projects);


$select_project_detail = "SELECT * FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND pd.builders_id = '$builders_id'";


// SELECT property_status
$select_property_status = "SELECT * FROM property_status";
$propertyStatusArray = $db_connect->query($select_property_status);

// SELECT property_types
$select_property_types = "SELECT * FROM property_types";
$propertyTypesArray = $db_connect->query($select_property_types);
// SELECT recommended_properties
$select_recommended_properties = "SELECT * FROM recommended_properties";
$recommendedPropertiesArray = $db_connect->query($select_recommended_properties);

// SELECT state
$select_state = "SELECT * FROM state";
$stateArray = $db_connect->query($select_state);

// SELECT unit_types
$select_unit_types = "SELECT * FROM unit_types";
$unitTypesArray = $db_connect->query($select_unit_types);


// Our partners
$select_partners = "SELECT * FROM builders_list WHERE builders_name LIKE '%brigade%' OR builders_name LIKE '%prestige%' OR builders_name LIKE '%sobha%' OR builders_name LIKE '%purvankara%' OR builders_name LIKE '%embassy%' OR builders_name LIKE '%godrej%' OR builders_name LIKE '%shapoorji%' OR builders_name LIKE '%assets%' OR builders_name = 'adarsh'  ";
$partnersArray = $db_connect->query($select_partners);

// Footer Recommonded Links
$inHeading = 'India';

$ftRecBuildersArray = $buildersArray;

$select_bed_rooms = mysqli_query($db_connect, "
	SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
	FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct, property_types AS pt
	WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_types_id=pt.property_types_id GROUP BY ct.city_name, br.bed_rooms_name AND pd.builders_id = '$builders_id' ORDER BY bed_rooms_id ASC");
$ftRecBhkInCityArray = array();
while ($row = mysqli_fetch_array($select_bed_rooms)) {
	$ftRecBhkInCityArray[] = $row;
}

$bhkPropTypes = mysqli_query($db_connect, "
	SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
	FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
	WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pt.property_types_name!='Plot' GROUP BY pt.property_types_name, br.bed_rooms_name, ct.city_name AND pd.builders_id = '$builders_id' ORDER BY ct.city_name, br.bed_rooms_id, pt.property_types_id ");
$ftRecBhkWithPropTypesInCityArray = array();
while ($row = mysqli_fetch_array($bhkPropTypes)) {
	$ftRecBhkWithPropTypesInCityArray[] = $row;
}
$propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
	FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
	WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.builders_id = '$builders_id' GROUP BY ct.city_name ");
$ftRecPropTypesInCityArray = array();
while ($row = mysqli_fetch_array($propertyTypes1)) {
	$ftRecPropTypesInCityArray[] = $row;
}

$fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct WHERE ar.city_id=ct.city_id ");
$ftRecCityWithAreaArray = array();
while ($row = mysqli_fetch_array($fetchCityWithArea)) {
	$ftRecCityWithAreaArray[] = $row;
}
