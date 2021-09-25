<?php
include 'fetch_all_table.php';
$single_url = $_GET['url'];
$noOfProjects = '';
$cityID = '';

if (isset($_POST['pageNumber'])) {
  $pageNumber = $_POST['pageNumber'];
} else if (!isset($_POST['pageNumber'])) {
  $pageNumber = 1;
}
$limit_per_page = 6;
$starting_from = ($pageNumber - 1) * $limit_per_page;


// ===Property Types===
$countSingle_urlProjects = mysqli_query($db_connect, "
  SELECT count(pd.project_id) AS countPropertTypeProjects
  FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
  WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
  AND pt.property_types_url='$single_url' ");
while ($row = mysqli_fetch_array($countSingle_urlProjects)) {
  $noOfProjects = $row['countPropertTypeProjects'];
  $totalPages = ceil($noOfProjects / $limit_per_page);
}

$select_single_url_projects = mysqli_query($db_connect, "
  SELECT *
  FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
  WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
  AND pt.property_types_url='$single_url' ORDER BY project_name ASC LIMIT $starting_from , $limit_per_page ");
if (mysqli_num_rows($select_single_url_projects) >= 1) {
  $resultArray = array();
  while ($row = mysqli_fetch_array($select_single_url_projects)) {
    $bredCrumbTitle = strtolower($row['property_types_name']) . ' in india';
    $heroTitle = $row['property_types_name'] . ' for sale in india';
    $subTitle = $row['property_types_name'] . ' for sale in india' . ' ' . $noOfProjects;
    $metaDescription = $row['property_types_description'];
    $resultArray[] = $row;
  }

  // ====Footer Selection By Property Types===

  $inHeading = "";
  $footer_builders_list = mysqli_query($db_connect, "SELECT bl.builders_id,bl.builders_name, bl.builders_url FROM project_detail AS pd,builders_list AS bl, state AS st, city AS ct, property_types AS pt, property_status AS ps WHERE pd.builders_id=bl.builders_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id  AND pt.property_types_url='$single_url'  GROUP BY bl.builders_name ");
  $ftRecBuildersArray = array();
  while ($row = mysqli_fetch_array($footer_builders_list)) {
    $ftRecBuildersArray[] = $row;
  }

  $select_bed_rooms = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
    FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct, property_types AS pt
    WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_types_id=pt.property_types_id AND pt.property_types_url='$single_url'  GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
  $ftRecBhkInCityArray = array();
  while ($row = mysqli_fetch_array($select_bed_rooms)) {
    $ftRecBhkInCityArray[] = $row;
  }
  $bhkPropTypes = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
    FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
    WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id GROUP BY pt.property_types_name, br.bed_rooms_name, ct.city_name ORDER BY pt.property_types_id, br.bed_rooms_id, ct.city_name ");
  $ftRecBhkWithPropTypesInCityArray = array();
  while ($row = mysqli_fetch_array($bhkPropTypes)) {
    $ftRecBhkWithPropTypesInCityArray[] = $row;
  }

  $propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
    FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
    WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id GROUP BY ct.city_name ");
  $ftRecPropTypesInCityArray = array();
  while ($row = mysqli_fetch_array($propertyTypes1)) {
    $ftRecPropTypesInCityArray[] = $row;
  }

  $fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct WHERE ar.city_id=ct.city_id ");
  $ftRecCityWithAreaArray = array();
  while ($row = mysqli_fetch_array($fetchCityWithArea)) {
    $ftRecCityWithAreaArray[] = $row;
  }

  // ====End Footer Selection By Property Types===
}


// ===Property Status===
else if (mysqli_num_rows($select_single_url_projects) <= 0) {
  $countSingle_urlProjects = mysqli_query($db_connect, "
    SELECT count(pd.project_id) AS countPropertTypeProjects
    FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
    WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
    AND ps.property_status_url='$single_url' ");
  while ($row = mysqli_fetch_array($countSingle_urlProjects)) {
    $noOfProjects = $row['countPropertTypeProjects'];
    $totalPages = ceil($noOfProjects / $limit_per_page);
  }

  $select_single_url_projects = mysqli_query($db_connect, "
    SELECT *
    FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
    WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
    AND ps.property_status_url='$single_url' ORDER BY project_name ASC LIMIT $starting_from , $limit_per_page ");
  if (mysqli_num_rows($select_single_url_projects) >= 1) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($select_single_url_projects)) {
      $bredCrumbTitle = strtolower($row['property_status_name']) . ' projects in india';
      $heroTitle = $row['property_status_name'] . ' projects in india';
      $subTitle = $row['property_status_name'] . ' projects in india' . ' ' . $noOfProjects;
      $metaDescription = $row['property_status_description'];
      $resultArray[] = $row;
    }

    // ---property status footer ---

    $inHeading = "By " . $row['builders_name'];
    $footer_builders_list = mysqli_query($db_connect, "SELECT bl.builders_id,bl.builders_name, bl.builders_url
      FROM project_detail AS pd,builders_list AS bl, state AS st, city AS ct, property_status AS ps
      WHERE pd.builders_id=bl.builders_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_status_id=ps.property_status_id AND ps.property_status_url='$single_url' GROUP BY bl.builders_name ");
    $ftRecBuildersArray = array();
    while ($row = mysqli_fetch_array($footer_builders_list)) {
      $ftRecBuildersArray[] = $row;
    }

    $select_bed_rooms = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
      FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct, property_status AS ps
      WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_status_id=ps.property_status_id AND ps.property_status_url='$single_url' GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
    $ftRecBhkInCityArray = array();
    while ($row = mysqli_fetch_array($select_bed_rooms)) {
      $ftRecBhkInCityArray[] = $row;
    }
    $bhkPropTypes = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
      FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
      WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id GROUP BY pt.property_types_name, br.bed_rooms_name, ct.city_name ORDER BY pt.property_types_id, br.bed_rooms_id, ct.city_name ");
    $ftRecBhkWithPropTypesInCityArray = array();
    while ($row = mysqli_fetch_array($bhkPropTypes)) {
      $ftRecBhkWithPropTypesInCityArray[] = $row;
    }

    $propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
      FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
      WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id GROUP BY ct.city_name ");
    $ftRecPropTypesInCityArray = array();
    while ($row = mysqli_fetch_array($propertyTypes1)) {
      $ftRecPropTypesInCityArray[] = $row;
    }

    $fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct WHERE ar.city_id=ct.city_id ");
    $ftRecCityWithAreaArray = array();
    while ($row = mysqli_fetch_array($fetchCityWithArea)) {
      $ftRecCityWithAreaArray[] = $row;
    }

    // ---end property status footer ---
  }


  // ===City===
  else if (mysqli_num_rows($select_single_url_projects) <= 0) {
    $countSingle_urlProjects = mysqli_query($db_connect, "
      SELECT count(pd.project_id) AS countPropertTypeProjects
      FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
      WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
      AND ct.city_url='$single_url' ");
    while ($row = mysqli_fetch_array($countSingle_urlProjects)) {
      $noOfProjects = $row['countPropertTypeProjects'];
      $totalPages = ceil($noOfProjects / $limit_per_page);
    }

    $select_single_url_projects = mysqli_query($db_connect, "
      SELECT *
      FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
      WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
      AND ct.city_url='$single_url' ORDER BY project_name ASC LIMIT $starting_from , $limit_per_page ");
    if (mysqli_num_rows($select_single_url_projects) >= 1) {
      $resultArray = array();
      while ($row = mysqli_fetch_array($select_single_url_projects)) {
        $bredCrumbTitle = 'property for sale in ' . strtolower($row['city_name']);
        $heroTitle = 'property for sale in ' . $row['city_name'];
        $subTitle = 'property for sale in ' . $row['city_name'] . ' ' . $noOfProjects;
        $metaDescription = $row['city_description'];
        $resultArray[] = $row;
      }

      // --- city footer ---

      $inHeading = " in " . $row['city_name'];
      $footer_builders_list = mysqli_query($db_connect, "SELECT bl.builders_id,bl.builders_name, bl.builders_url
        FROM project_detail AS pd,builders_list AS bl, state AS st, city AS ct
        WHERE pd.builders_id=bl.builders_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_url='$single_url' GROUP BY bl.builders_name");
      $ftRecBuildersArray = array();
      while ($row = mysqli_fetch_array($footer_builders_list)) {
        $ftRecBuildersArray[] = $row;
      }

      $select_bed_rooms = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
        FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct
        WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_url='$single_url' GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
      $ftRecBhkInCityArray = array();
      while ($row = mysqli_fetch_array($select_bed_rooms)) {
        $ftRecBhkInCityArray[] = $row;
      }
      $bhkPropTypes = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
        FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
        WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_url='$single_url' AND pt.property_types_name!='Plot' GROUP BY pt.property_types_name, br.bed_rooms_name ORDER BY pt.property_types_id, br.bed_rooms_id ");
      $ftRecBhkWithPropTypesInCityArray = array();
      while ($row = mysqli_fetch_array($bhkPropTypes)) {
        $ftRecBhkWithPropTypesInCityArray[] = $row;
      }

      $propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
        FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
        WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_url='$single_url' GROUP BY pt.property_types_name ");
      $ftRecPropTypesInCityArray = array();
      while ($row = mysqli_fetch_array($propertyTypes1)) {
        $ftRecPropTypesInCityArray[] = $row;
      }

      $fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct, state As st WHERE ar.city_id=ct.city_id AND ct.state_id=st.state_id AND ct.city_url='$single_url' ");
      $ftRecCityWithAreaArray = array();
      while ($row = mysqli_fetch_array($fetchCityWithArea)) {
        $ftRecCityWithAreaArray[] = $row;
      }

      // --- end city footer ---
    }


    // ===Builders===
    else if (mysqli_num_rows($select_single_url_projects) <= 0) {
      $countSingle_urlProjects = mysqli_query($db_connect, "
        SELECT count(pd.project_id) AS countPropertTypeProjects, bl.completed_projects
        FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
        WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
        AND bl.builders_url='$single_url' ");
      while ($row = mysqli_fetch_array($countSingle_urlProjects)) {
        $noOfProjects = $row['countPropertTypeProjects'];
        $totalPages = ceil($noOfProjects / $limit_per_page);
        $noOfCompletedProjects = $row['completed_projects'];
      }

      $select_single_url_projects = mysqli_query($db_connect, "
        SELECT *
        FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
        WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
        AND bl.builders_url='$single_url' ORDER BY project_name ASC LIMIT $starting_from , $limit_per_page ");
      if (mysqli_num_rows($select_single_url_projects) >= 1) {
        $resultArray = array();
        while ($row = mysqli_fetch_array($select_single_url_projects)) {
          $bredCrumbTitle = 'Residential Projects by ' . strtolower($row['builders_name']);
          $heroTitle = 'Residential Projects by ' . $row['builders_name'];
          $subTitle = $noOfCompletedProjects . ' Completed Projects' . ' | ' . $noOfProjects . ' ongoing projects';
          $metaDescription = $row['about_group'];
          $resultArray[] = $row;
        }

        // --- start builders footer  ---
        $inHeading = "By " . $row['builders_name'];
        $footer_builders_list = mysqli_query($db_connect, "SELECT * FROM builders_list WHERE builders_url='$single_url' ");
        $ftRecBuildersArray = array();
        while ($row = mysqli_fetch_array($footer_builders_list)) {
          $ftRecBuildersArray[] = $row;
        }

        $select_bed_rooms = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
          FROM project_detail AS pd, builders_list AS bl, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct, property_types AS pt
          WHERE pd.builders_id=bl.builders_id AND pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.property_types_id=pt.property_types_id AND bl.builders_url='$single_url'  GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
        $ftRecBhkInCityArray = array();
        while ($row = mysqli_fetch_array($select_bed_rooms)) {
          $ftRecBhkInCityArray[] = $row;
        }
        $bhkPropTypes = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
          FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
          WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pt.property_types_name!='Plot' GROUP BY pt.property_types_name, br.bed_rooms_name, ct.city_name ORDER BY pt.property_types_id, br.bed_rooms_id, ct.city_name ");
        $ftRecBhkWithPropTypesInCityArray = array();
        while ($row = mysqli_fetch_array($bhkPropTypes)) {
          $ftRecBhkWithPropTypesInCityArray[] = $row;
        }

        $propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
        FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
        WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND ct.city_url='$single_url' GROUP BY pt.property_types_name ");
        $ftRecPropTypesInCityArray = array();
        while ($row = mysqli_fetch_array($propertyTypes1)) {
          $ftRecPropTypesInCityArray[] = $row;
        }

        $fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct, state As st WHERE ar.city_id=ct.city_id AND ct.state_id=st.state_id AND ct.city_url='$single_url' ");
        $ftRecCityWithAreaArray = array();
        while ($row = mysqli_fetch_array($fetchCityWithArea)) {
          $ftRecCityWithAreaArray[] = $row;
        }

        // ---  end builders footer ---
      }

      // ===States==
      else if (mysqli_num_rows($select_single_url_projects) <= 0) {
        $countSingle_urlProjects = mysqli_query($db_connect, "
          SELECT count(pd.project_id) AS countPropertTypeProjects
          FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
          WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
          AND st.state_url='$single_url' ");
        while ($row = mysqli_fetch_array($countSingle_urlProjects)) {
          $noOfProjects = $row['countPropertTypeProjects'];
          $totalPages = ceil($noOfProjects / $limit_per_page);
        }

        $select_single_url_projects = mysqli_query($db_connect, "
          SELECT *
          FROM project_detail AS pd, builders_list AS bl, country AS cr, state AS st, city AS ct, area AS ar, unit_types AS ut, property_types AS pt, property_status AS ps
          WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id
          AND st.state_url='$single_url' ORDER BY project_name ASC LIMIT $starting_from , $limit_per_page ");
        if (mysqli_num_rows($select_single_url_projects) >= 1) {
          $resultArray = array();
          while ($row = mysqli_fetch_array($select_single_url_projects)) {
            $bredCrumbTitle = 'residential projects in ' . strtolower($row['state_name']);
            $heroTitle = 'Residential Projects in ' . $row['state_name'];
            $subTitle = 'Total Projects in ' . $row['state_name'] . ' ' . $noOfProjects;
            $metaDescription = $row['state_description'];
            $resultArray[] = $row;
          }

          // ---  start state footer ---
          $inHeading = " in " . $row['state_name'];
          $footer_builders_list = mysqli_query($db_connect, "SELECT bl.builders_id,bl.builders_name, bl.builders_url, city_name FROM project_detail AS pd,builders_list AS bl, state AS st, city AS ct WHERE pd.builders_id=bl.builders_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND st.state_url='$single_url' GROUP BY bl.builders_name ");
          $ftRecBuildersArray = array();
          while ($row = mysqli_fetch_array($footer_builders_list)) {
            $ftRecBuildersArray[] = $row;
          }

          $select_bed_rooms = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, st.state_name, ct.city_name, ct.city_url
            FROM project_detail AS pd, bed_rooms AS br, unit_configuration AS uc, state AS st, city AS ct
            WHERE pd.project_id=uc.project_id AND br.bed_rooms_id=uc.unit_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND st.state_url='$single_url'  GROUP BY br.bed_rooms_name ORDER BY bed_rooms_id ASC");
          $ftRecBhkInCityArray = array();
          while ($row = mysqli_fetch_array($select_bed_rooms)) {
            $ftRecBhkInCityArray[] = $row;
          }

          $bhkPropTypes = mysqli_query($db_connect, "SELECT br.bed_rooms_name, br.bed_rooms_url, ct.city_name, ct.city_url, pt.property_types_name, pt.property_types_url
            FROM project_detail AS pd, property_types AS pt, bed_rooms AS br, state AS st, city AS ct
            WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND st.state_url='$single_url' AND pt.property_types_name!='Plot' GROUP BY pt.property_types_name, br.bed_rooms_name ORDER BY pt.property_types_id, br.bed_rooms_id ");
          $ftRecBhkWithPropTypesInCityArray = array();
          while ($row = mysqli_fetch_array($bhkPropTypes)) {
            $ftRecBhkWithPropTypesInCityArray[] = $row;
          }

          $propertyTypes1 = mysqli_query($db_connect, "SELECT pt.property_types_name, pt.property_types_url, st.state_name, ct.city_name, ct.city_url 
            FROM project_detail AS pd,property_types AS pt, state AS st, city AS ct
            WHERE pd.property_types_id=pt.property_types_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND st.state_url='$single_url' GROUP BY pt.property_types_name ");
          $ftRecPropTypesInCityArray = array();
          while ($row = mysqli_fetch_array($propertyTypes1)) {
            $ftRecPropTypesInCityArray[] = $row;
          }

          $fetchCityWithArea = mysqli_query($db_connect, "SELECT * FROM area AS ar, city AS ct, state As st WHERE ar.city_id=ct.city_id AND ct.state_id=st.state_id AND st.state_url='$single_url' ");
          $ftRecCityWithAreaArray = array();
          while ($row = mysqli_fetch_array($fetchCityWithArea)) {
            $ftRecCityWithAreaArray[] = $row;
          }

          // ---  end state footer ---
        }
      }
    }
  }
}

$metaKeyword = array();
foreach ($resultArray as $single_url_projects) {
  $metaKeyword[] = $single_url_projects['meta_keywords'];
}

$metaTitile = strip_tags($heroTitle);
$metaKeyword = strip_tags(implode(',', $metaKeyword));
$metaDescription = strip_tags($metaDescription);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header_links.php' ?>
</head>

<body class="property-listing">

  <?php
  include 'navbar.php';
  include 'navbar-search.php';
  ?>

  <!-- Banner -->
  <div class="hero-wrapper">
    <div class="hero" style="background: url(assets/images/img/properties-6.jpg);">
      <div class="overlay">
        <div class="hero-caption">
          <h1 class="title"><?php echo $heroTitle ?></h1>
          <h3 class="sub-title"><?php echo $subTitle ?></h3>
        </div>
      </div>
    </div>
  </div>
  <!-- ./ Banner -->

  <!-- Hot Projects -->
  <section class="section listing">
    <div class="container-fluid">
      <div class="row g-3">
        <div class="col-12 col-md-8 col-lg-9 listing-main order-0 order-md-1">
          <div class="project-listing-grid">
            <?php
            foreach ($resultArray as $result) {
              $resultProjectName = $result['project_name'];
              $resultProjectId = $result['project_id'];
              $resultProjectLocation = $result['project_location'];
              $resultProjectPrice = $result['price'];
              $resultProjectBed = $result['unti_types_name'];
              $resultProjectUnits = $result['total_units'];
              $resultProjectType = $result['property_types_name'];
              $resultProjectStatus = $result['property_status_name'];
              $resultProjectBuilder = $result['builders_name'];
              $resultProjectBanner = "./admin/banner_image_uploads/banner_mobile/" . $result['banner_image'];
              $resultProjectUrl = strtolower($result['city_url'] . '/' . $result['area_url'] . '/' . str_replace(' ', '-', $result['project_name']) . '/review/brouchure/floor-plan/price');
            ?>
              <div class="projects">
                <div class="image" style="background: url(<?php echo $resultProjectBanner ?>);">
                  <div class="overlay"></div>
                </div>
                <div class="projects-deatil">
                  <div class="head">
                    <h3 class="name"><?php echo $resultProjectName ?></h3>
                    <p class="location"><i class="fa fa-map-marker-alt"></i><?php echo $resultProjectLocation ?></p>
                  </div>
                  <div class="body">
                    <ul class="">
                      <li>
                        <div class="div"><i class="fa fa-rupee-sign"></i><?php echo $resultProjectPrice ?></div>
                        <div class="div"><i class="fa fa-bed"></i><?php echo $resultProjectBed ?></div>
                      </li>
                      <li>
                        <div class="div"><i class="fa fa-building"></i><?php echo $resultProjectUnits ?></div>
                        <div class="div"><i class="fa fa-calendar"></i><?php echo $resultProjectStatus ?></div>
                      </li>
                      <li>
                        <div class="div"><i class="fa fa-user"></i><?php echo $resultProjectBuilder ?></div>
                      </li>
                      <li>
                        <div class="div"><button class="btn btn-sm btn-dark projectInquiry" id="<?php echo $resultProjectId ?>" type="button">Enquire Now</button></div>
                        <div class="div"><a class="btn btn-sm btn-danger" href="<?php echo $resultProjectUrl ?>" target="_blank">View More</a></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="pagination-wrapper">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                  if ($pageNumber == $i) {
                    $active = 'active';
                    $page = 'page';
                  } else {
                    $active = '';
                    $page = '';
                  }
                ?>
                  <li class="page-item page-number <?php echo $active ?>" aria-current="<?php echo $page ?>"><button class="page-link" id="<?php echo $i ?>"><?php echo $i ?></button></li>
                <?php } ?>

                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
            <form action="" method="POST" id="pageIgnitionForm">
              <input type="hidden" name="pageNumber" class="form-control" id="pageNumber">
            </form>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 listing-sub order-1 order-md-0">
          <aside>
            <div class="form">
              <h5 class="contact-head mb-3">Contact Heading</h5>
              <form method="post" action="project_inquiry.php" id="myForm">
                <div class="mb-3">
                  <select class="form-select form-builder" name="" id="">
                    <optgroup label="Select Builders">
                      <option value="">Select Builders</option>
                      <?php
                      foreach ($buildersArray as $builders) {
                        $buildersId = $builders['builders_id'];
                        $buildersName = $builders['builders_name'];
                        $buildersUrl = $builders['builders_url'];
                      ?>
                        <option value="<?php echo $buildersId ?>"><?php echo $buildersName ?></option>
                      <?php } ?>
                    </optgroup>
                  </select>
                </div>
                <div class="mb-3">
                  <select class="form-select" id="form-projects" name="project_id" disabled>
                    <option value="">Select Builder First</option>
                  </select>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="">
                </div>
                <div class="mb-3">
                  <input class="form-control" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13">
                </div>
                <div class="mb-3">
                  <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                </div>
                <div class="d-grid">
                  <button class="btn btn-outline-danger" type="submit" name="submit_inquiry">Submit</button>
                </div>
              </form>
            </div>
            <div class="latest-projects">
              <h5 class="contact-head my-3">Featured Properties</h5>
              <div class="owl-carousel carousel-single">
                <?php
                foreach ($featuredProjectsArray as $featuredProjects) {
                  $featuredProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $featuredProjects['banner_image'];
                  $featuredProjectsTitle = $featuredProjects['project_name'];
                  $featuredProjectsLocation = $featuredProjects['project_location'];
                  $featuredProjectsPrice = $featuredProjects['price'];
                  $featuredProjectsUrl = strtolower($featuredProjects['city_url'] . '/' . $featuredProjects['area_url'] . '/' . str_replace(' ', '-', $featuredProjects['project_name']) . '/review/brouchure/floor-plan/price');
                ?>
                  <div class="latest-project-card">
                    <a href="<?php echo $featuredProjectsUrl ?>" class="text-decoration-none">

                      <div class="image" style="background: url();">

                        <div class="overlay"><button class="btn btn-secondary btn-sm"><i class="fa fa-rupee-sign"></i> <?php echo $featuredProjectsPrice ?></button></div>
                        <div class="caption">
                          <div>
                            <h4 class="name"><?php echo $featuredProjectsTitle ?></h4>
                            <p class="location"><i class="fa fa-map-marker"></i><?php echo $featuredProjectsLocation ?></p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
            <div class="hot-projects">
              <h5 class="contact-head my-3">Hot Deals</h5>
              <div class="owl-carousel carousel-single">
                <?php
                foreach ($hotProjectsArray as $hotProjects) {
                  $hotProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $hotProjects['banner_image'];
                  $hotProjectsTitle = $hotProjects['project_name'];
                  $hotProjectsId = $hotProjects['project_id'];
                  $hotProjectsLocation = $hotProjects['project_location'];
                  $hotProjectsPrice = $hotProjects['price'];
                  $hotProjectsUrl = strtolower($hotProjects['city_url'] . '/' . $hotProjects['area_url'] . '/' . str_replace(' ', '-', $hotProjects['project_name']) . '/review/brouchure/floor-plan/price');
                ?>
                  <div class="hot-project-card">
                    <a href="<?php echo $hotProjectsUrl ?>" class="text-decoration-none">
                      <div class="image" style="background: url();">
                        <div class="overlay"></div>
                      </div>
                    </a>
                    <div class="detail">
                      <a href="<?php echo $hotProjectsUrl ?>" class="text-decoration-none">
                        <h4 class="name"><?php echo $hotProjectsTitle ?></h4>
                        <p class="location"><i class="fa fa-location"></i> <?php echo $hotProjectsLocation ?></p>
                      </a>
                      <div class="price-detail d-flex justify-content-between flex-row">
                        <button class="btn btn-sm btn-danger price"><i class="fa fa-rupee-sign"></i><?php echo $hotProjectsPrice ?></button>
                        <button class="btn btn-sm btn-danger enquire projectInquiry" id="<?php echo $hotProjectsId ?>"><i class="fa fa-envelope-open"></i>Enquire Now</button>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <div class="latest-projects">
              <h5 class="contact-head my-3">Latest Projects</h5>
              <div class="owl-carousel carousel-single">
                <?php
                foreach ($featuredProjectsArray as $featuredProjects) {
                  $featuredProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $featuredProjects['banner_image'];
                  $featuredProjectsTitle = $featuredProjects['project_name'];
                  $featuredProjectsLocation = $featuredProjects['project_location'];
                  $featuredProjectsPrice = $featuredProjects['price'];
                  $featuredProjectsUrl = strtolower($featuredProjects['city_url'] . '/' . $featuredProjects['area_url'] . '/' . str_replace(' ', '-', $featuredProjects['project_name']) . '/review/brouchure/floor-plan/price');
                ?>
                  <div class="latest-project-card">
                    <a href="<?php echo $featuredProjectsLocation ?>" class="text-decoration-none">
                      <div class="image" style="background: url();">
                        <div class="overlay"></div>
                        <div class="caption">
                          <div>
                            <h4 class="name"><?php echo $featuredProjectsTitle ?></h4>
                            <p class="location"><i class="fa fa-map-marker"></i><?php echo $featuredProjectsLocation ?></p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- ./ Hot Projects -->

  <?php 
    include 'footer.php';
    include 'script_links.php'; 
  ?>
</body>

</html>