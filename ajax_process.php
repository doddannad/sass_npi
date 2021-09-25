<?php
include 'db_config.php';
// Start Suggesstions
if (!empty($_POST['chosedCity'])) {
	$chosedCityName = $_POST['chosedCity'];
	$fetchSuggesstionProjects = "SELECT * FROM project_detail AS pd, city AS ct WHERE pd.city_id = ct.city_id AND ct.city_name = '$chosedCityName' ";
	$suggesstionProjectsArray = $db_connect->query($fetchSuggesstionProjects);
	foreach ($suggesstionProjectsArray as $suggesstionProjects) { ?>
		<option value="<?php echo $suggesstionProjects['project_name'] ?>"><?php echo $suggesstionProjects['project_name'] ?>, <?php echo $suggesstionProjects['project_location'] ?></option>
	<?php }
}
// End Suggesstions

// Start Builder Projects
else if (!empty($_POST['builderId'])) {
	$bauilderId = $_POST['builderId'];
	$fetchBuilderProjects = "SELECT * FROM project_detail WHERE builders_id = '$bauilderId' ";
	$builderProjectsArray = $db_connect->query($fetchBuilderProjects);
	?>
	<optgroup label="Select Project">
		<option value="">Select Project</option>
		<?php
		foreach ($builderProjectsArray as $builderProjects) { ?>
			<option value="<?php echo $builderProjects['project_id'] ?>"><?php echo $builderProjects['project_name'] ?></option>

		<?php
		} ?>
	</optgroup>
<?php
}
// End Builder Projects

// Statrt Select Single Project
else if (isset($_POST["project_id"])) {
	$query = "SELECT * FROM project_detail WHERE project_id = '" . $_POST["project_id"] . "'";
	$result = mysqli_query($db_connect, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}
// End  Select Single Project
?>