<?php
include 'prevent.php';
include 'db_config.php';

// ----Builders List---
$select_builders_list=mysqli_query($db_connect,"SELECT * FROM builders_list");
$builders_list = array();
while ($row=mysqli_fetch_array($select_builders_list)) 
{
	$builders_list[]=$row;
}
// ----End Builders List---

// -------Country State City Area List----
$country_list=mysqli_query($db_connect,"SELECT * FROM country");
$countryArray = array();
while ($row=mysqli_fetch_array($country_list)) {
	$countryArray[]=$row;
}

$state_list=mysqli_query($db_connect,"SELECT * FROM state");
$stateArray = array();
while ($row=mysqli_fetch_array($state_list)) {
	$stateArray[]=$row;
}

$city_list=mysqli_query($db_connect,"SELECT * FROM city");
$cityArray = array();
while ($row=mysqli_fetch_array($city_list)) {
	$cityArray[]=$row;
}

$area_list=mysqli_query($db_connect,"SELECT * FROM area");
$areaArray = array();
while ($row=mysqli_fetch_array($area_list)) {
	$areaArray[]=$row;
}
// ------End Country State City Area List----

// All Project List
$selectAllProject = mysqli_query($db_connect,"SELECT * FROM  project_detail ");
$projectsArray = array();
while ($row=mysqli_fetch_array($selectAllProject)) {
	$projectsArray[]=$row;
}
$select_project_list=mysqli_query($db_connect,"
	SELECT *
	FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps
	WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id ORDER BY created_date DESC");

$project_detail = array();
while ($row=mysqli_fetch_array($select_project_list)) {
	$project_detail[]=$row;
}

// Recent Slider Project List
$select_recent_slider=mysqli_query($db_connect,"
	SELECT pd.project_id,bl.builders_name,pd.project_name,cr.country_name,st.state_name,ct.city_name,ar.area_name,pd.project_location,ut.unti_types_name,pd.price,pd.total_land_area,pd.total_units,pd.blocks_towers,pd.possesion_date,pd.about_project,pt.property_types_name,ps.property_status_name,pd.banner_image
	FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps
	WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id ORDER BY created_date DESC LIMIT 6  ");

$recentSlider = array();
while ($row=mysqli_fetch_array($select_recent_slider)) {
	$recentSlider[]=$row;
}

//------Bed Rooms & Unit Types & File Types----
$select_bed_rooms=mysqli_query($db_connect,"SELECT * FROM bed_rooms ORDER BY bed_rooms_id ASC");
$bedRoomsArray = array();
while ($row=mysqli_fetch_array($select_bed_rooms)) {
	$bedRoomsArray[]=$row;
}

$select_unit_types=mysqli_query($db_connect,"SELECT * FROM unit_types");
$unitTypesArray = array();
while ($row=mysqli_fetch_array($select_unit_types)) {
	$unitTypesArray[]=$row;
}

$select_fileTypes=mysqli_query($db_connect,"SELECT * FROM file_types");
$fileTypesArray = array();
while ($row=mysqli_fetch_array($select_fileTypes)) {
	$fileTypesArray[]=$row;
}
//------End Unit Types & File Types-- 

// -----Property Types & Status----
$propertyTypes=mysqli_query($db_connect,"SELECT * FROM property_types");
$propertyTypesArray = array();
while ($row=mysqli_fetch_array($propertyTypes)) {
	$propertyTypesArray[]=$row;
}
$propertyStatus=mysqli_query($db_connect,"SELECT * FROM property_status");
$propertyStatusArray = array();
while ($row=mysqli_fetch_array($propertyStatus)) {
	$propertyStatusArray[]=$row;
}
// -----End Property Types & Status ---

// -------Select Price Sheet-------
$selectPriceSheet=mysqli_query($db_connect,"
	SELECT pd.project_id,pd.project_name,ut.unti_types_name,pc.sqft,pc.price_amount
	FROM price_sheet AS pc,project_detail AS pd,unit_types AS ut
	WHERE pc.project_id=pd.project_id AND pc.unit_types_id=ut.unit_types_id GROUP BY project_name ");
$priceSheet = array();
while ($row=mysqli_fetch_array($selectPriceSheet)) 
{
	$priceSheet[]=$row;
}
// ------End Select Price Sheet-----

// -------Select Unit Configurations-------
$selectUnitConfigs=mysqli_query($db_connect,"
	SELECT  pd.project_id,pd.project_name,ut.unti_types_name,uc.super_builtup_area,uc.super_builtup_area
	FROM unit_configuration AS uc,project_detail AS pd,unit_types AS ut
	WHERE uc.project_id=pd.project_id AND uc.unit_types_id=ut.unit_types_id  GROUP BY project_name ");
$unitConfigs = array();
while ($row=mysqli_fetch_array($selectUnitConfigs)) 
{
	$unitConfigs[]=$row;
}
// ------End Select Unit Configurations-----

// -------Select Images-------
$selectUploadedFiles=mysqli_query($db_connect,"
	SELECT fd.files_detail_id,fd.project_id,pd.project_name,fd.file_id,fd.files
	FROM files_detail AS fd,project_detail AS pd,file_types AS ft
	WHERE fd.project_id=pd.project_id AND fd.file_id=ft.file_id GROUP BY project_name ");
$uploadedFilesArray = array();
while ($row=mysqli_fetch_array($selectUploadedFiles)) 
{
	$uploadedFilesArray[]=$row;
}
// ------End Select Images-----

// -------Select Amenities-------
$selectAmenities=mysqli_query($db_connect,"
	SELECT am.amenities_id,am.project_id,pd.project_name,am.amenities_name
	FROM amenities AS am,project_detail AS pd
	WHERE am.project_id=pd.project_id GROUP BY project_name ");
$amenitiesArray = array();
while ($row=mysqli_fetch_array($selectAmenities)) 
{
	$amenitiesArray[]=$row;
}
// ------End Select Amenities-----

// -------Select Amenities-------
$selectSpecifications=mysqli_query($db_connect,"
	SELECT sp.specifications_id,sp.project_id,sp.specification_name,sp.description,pd.project_name
	FROM specifications AS sp,project_detail AS pd
	WHERE sp.project_id=pd.project_id GROUP BY project_name ");
$specificationsArray = array();
while ($row=mysqli_fetch_array($selectSpecifications)) 
{
	$specificationsArray[]=$row;
}
// ------End Select Amenities-----

// ---------Select Maps --------
$selectMaps=mysqli_query($db_connect,"
	SELECT ld.location_id,ld.project_id,ld.lat,ld.lng,pd.project_name
	FROM location_detail AS ld,project_detail AS pd WHERE ld.project_id=pd.project_id
	 ");
$mapsArray = array();
while ($row=mysqli_fetch_array($selectMaps)) {
	$mapsArray[]=$row;
}
// ---------End Maps-----------

// --------Select Projects Price Range-----
$selectProjectsPriceRange=mysqli_query($db_connect,"
	SELECT ppr.projects_price_range_id,ppr.project_id,pd.project_name, ppr.price_range_id,pr.price_range_name
	FROM projects_price_range AS ppr,project_detail AS pd,price_range AS pr WHERE ppr.project_id=pd.project_id AND ppr.price_range_id=pr.price_range_id ORDER BY projects_price_range_id  ASC ");
$projectsPriceRangeArray = array();
while ($row=mysqli_fetch_array($selectProjectsPriceRange)) {
	$projectsPriceRangeArray[]=$row;
}
// --------End Projects Price Range--------

// ---------Select Price Range --------
$selectPriceRange=mysqli_query($db_connect,"SELECT * FROM price_range ORDER BY price_range_id  ASC ");
$priceRangeArray = array();
while ($row=mysqli_fetch_array($selectPriceRange)) {
	$priceRangeArray[]=$row;
}
// ---------End Price Range-----------

// ----------Select All Comments----------
$selectComments=mysqli_query($db_connect,"SELECT tc.comment_id,tc.ratings,tc.parent_comment_id,tc.comment_sender_name,tc.comment_email,tc.comment_phone,tc.comment,pd.project_name FROM tbl_comment AS tc,project_detail AS pd WHERE tc.project_id=pd.project_id AND comment_aprov_status='PENDING' ORDER BY tc.comment DESC ");
$commentsArray = array();
while ($row=mysqli_fetch_array($selectComments)) {
	$commentsArray[]=$row;
}
// ----------Select End All Comments------

// ----------Select Approved Comments----------
$selectApprovedComments=mysqli_query($db_connect,"SELECT tc.comment_id,tc.ratings,tc.parent_comment_id,tc.comment_sender_name,tc.comment_email,tc.comment_phone,tc.comment,pd.project_name FROM tbl_comment AS tc,project_detail AS pd WHERE tc.project_id=pd.project_id AND comment_aprov_status='1' ");
$approvedCommentsArray = array();
while ($row=mysqli_fetch_array($selectApprovedComments)) {
	$approvedCommentsArray[]=$row;
}
// ----------Select End Approved Comments------

// ----------Select Rejected Comments----------
$selectRejectedComments=mysqli_query($db_connect,"SELECT tc.comment_id,tc.ratings,tc.parent_comment_id,tc.comment_sender_name,tc.comment_email,tc.comment_phone,tc.comment,pd.project_name FROM tbl_comment AS tc,project_detail AS pd WHERE tc.project_id=pd.project_id AND comment_aprov_status='0' ");
$rejectedCommentsArray = array();
while ($row=mysqli_fetch_array($selectRejectedComments)) {
	$rejectedCommentsArray[]=$row;
}
// ----------Select End Rejected Comments------

// -----------Select Blogs---
$selectBlogs=mysqli_query($db_connect,"SELECT * FROM blogs AS bg,project_detail AS pd
	WHERE bg.project_id=pd.project_id ORDER BY created DESC ");
$blogArray = array();
while ($row=mysqli_fetch_array($selectBlogs)) {
	$blogArray[]=$row;
}
// -----------End Blogs------

// ---------- Select Advts-----------
$selectAdvts = mysqli_query($db_connect,"SELECT * FROM advertisements ");
$advtArray = array();
while ($row=mysqli_fetch_array($selectAdvts)) {
	$advtArray[]=$row;
}
// ---------- End Advts -------------

// ----Select Recommonded Projects----------
$selectRecommonded=mysqli_query($db_connect,"SELECT * FROM recommended_properties");
$recommondedArray = array();
while ($row=mysqli_fetch_array($selectRecommonded)) {
	$recommondedArray[]=$row;
}
// ----End Select Recommonded Projects------

// ======Count All Table====
$countTotalProjects=mysqli_query($db_connect,"SELECT COUNT(project_id) AS totalProjects FROM project_detail");
while ($row=mysqli_fetch_array($countTotalProjects)) {
	$totalProjects=$row['totalProjects'];
}

$countTotalBuilders=mysqli_query($db_connect,"SELECT COUNT(builders_id) AS totalBuilders FROM builders_list");
while ($row=mysqli_fetch_array($countTotalBuilders)) {
	$totalBuilders=$row['totalBuilders'];
}

$countTotalCitys=mysqli_query($db_connect,"SELECT COUNT(city_id) AS totalCitys FROM city");
while ($row=mysqli_fetch_array($countTotalCitys)) {
	$totalCitys=$row['totalCitys'];
}

$countBuildersProjects=mysqli_query($db_connect,"
	SELECT bl.builders_name,COUNT(project_id) AS buildersProjects
	FROM project_detail AS pd, builders_list AS bl
	WHERE pd.builders_id=bl.builders_id GROUP BY builders_name ");
$countBuilderWiseProjectsArray = array();
while ($row=mysqli_fetch_array($countBuildersProjects)) {
	$countBuilderWiseProjectsArray[]=$row;
}

$countStatesProjects=mysqli_query($db_connect,"
	SELECT st.state_name,COUNT(project_id) AS stateProjects
	FROM project_detail AS pd, state AS st
	WHERE pd.state_id=st.state_id GROUP BY state_name ");
$countStateWiseProjectsArray = array();
while ($row=mysqli_fetch_array($countStatesProjects)) {
	$countStateWiseProjectsArray[]=$row;
}

$countCitysProjects=mysqli_query($db_connect,"
	SELECT ct.city_name,COUNT(project_id) AS cityProjects
	FROM project_detail AS pd, city AS ct
	WHERE pd.city_id=ct.city_id GROUP BY city_name ");
$countCityWiseProjectsArray = array();
while ($row=mysqli_fetch_array($countCitysProjects)) {
	$countCityWiseProjectsArray[]=$row;
}

$countAreasProjects=mysqli_query($db_connect,"
	SELECT ar.area_name,COUNT(project_id) AS areaProjects
	FROM project_detail AS pd, area AS ar
	WHERE pd.area_id=ar.area_id GROUP BY area_name ");
$countAreaWiseProjectsArray = array();
while ($row=mysqli_fetch_array($countAreasProjects)) {
	$countAreaWiseProjectsArray[]=$row;
}

$countAppartments=mysqli_query($db_connect,"
	SELECT pt.property_types_name,COUNT(project_id) AS appartments
	FROM project_detail AS pd, property_types AS pt
	WHERE pd.property_types_id=pt.property_types_id GROUP BY property_types_name ");
$countAppartment = array();
while ($row=mysqli_fetch_array($countAppartments)) {
	$countAppartment[]=$row;
}

$countPropertyStatus=mysqli_query($db_connect,"
	SELECT ps.property_status_name,COUNT(project_id) AS projectsStatus
	FROM project_detail AS pd, property_status AS ps
	WHERE pd.property_status_id=ps.property_status_id GROUP BY property_status_name ");
$countProjectStatus = array();
while ($row=mysqli_fetch_array($countPropertyStatus)) {
	$countProjectStatus[]=$row;
}

$countComments=mysqli_query($db_connect,"SELECT count(comment_id) AS noOfComments FROM tbl_comment ");
while ($row=mysqli_fetch_array($countComments)) {
	$countNoOfComment=$row['noOfComments'];
}
// ======End Counts=========


?>




<!-- =============Dependent Drop Downs=========== -->
<!-- Dependent Dropdowns for State City Area -->
<?php
if(!empty($_POST["country_id"])) 
{
	$query =mysqli_query($db_connect,"SELECT * FROM state WHERE country_id = '" . $_POST["country_id"] . "'");
	?>
	<option value="">Select State</option>
	<?php
	while($row=mysqli_fetch_array($query))  
	{?>
		<option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
	<?php
	}
}
?>

<?php
if(!empty($_POST["state_id"])) 
{
	$query =mysqli_query($db_connect,"SELECT * FROM city WHERE state_id = '" . $_POST["state_id"] . "'");
	if (mysqli_num_rows($query)>0) {
		$cityArray = array();
		while($row=mysqli_fetch_array($query)){
			$cityArray[]=$row;
		}
		?>
		<option value="">Select City</option>
		<?php
		foreach ($cityArray as $city)  
		{
			?>
			<option value="<?php echo $city["city_id"]; ?>"><?php echo $city["city_name"]; ?></option>
			<?php
		}
	}
	else{
		while($row=mysqli_fetch_array($query)){
			$cityArray[]=$row;
		}
		?>
		<option value="">No Cities</option><?php
	}
}
?>

<?php
if(!empty($_POST['city_id']))
{
	$query =mysqli_query($db_connect,"SELECT * FROM area WHERE city_id = '" .$_POST["city_id"] . "'");
	if (mysqli_num_rows($query)>0) {
		$cityArray = array();
		while($row=mysqli_fetch_array($query)){
			$cityArray[]=$row;
		}?>
		<option value="">Select Area</option>

		<?php
		foreach ($cityArray as $city)  {?>
			<option value="<?php echo $city["area_id"]; ?>"><?php echo $city["area_name"]; ?></option>
			<?php
		}
	}
	else{
		while($row=mysqli_fetch_array($query)){
			$cityArray[]=$row;
		}
		?>
		<option value="">No Areas</option><?php
	}
}
?>

<!-- End Dependent Dropdowns for State City Area -->

<!--  -->
<?php
if (!empty($_POST['builders_id'])) {
	$query=mysqli_query($db_connect,"SELECT * FROM project_detail WHERE builders_id='".$_POST['builders_id']."'");

	if (mysqli_num_rows($query)>=1) {
		$projectNameArray = array();
		while ($row=mysqli_fetch_array($query)) {
			$projectNameArray[]=$row;
		}?>
		<option value="">Select Project</option>
		<?php
		foreach ($projectNameArray as $projectNames) {?>
			<option value="<?php echo $projectNames['project_id']?>">
				<?php echo $projectNames['project_name']?>
			</option>
			<?php
			}
		}
		else{
			while($row=mysqli_fetch_array($query)){
				$projectNameArray[]=$row;
			}
			?>
			<option value="">No Projects</option><?php
		}
	}

	?>
<!--  -->

<!-- Search Box Script -->

<!-- End Search Box Script -->