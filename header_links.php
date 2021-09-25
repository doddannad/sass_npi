<?php
function getFullAddressUrl()
{
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $protocol = "https";
  } else {
    $protocol = "http";
  }
  return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}
getFullAddressUrl();

$geturl = $_SERVER['REQUEST_URI'];

if (empty($metaTitile)) {
  $metaTitile = '';
} else if (empty($metaKeyword)) {
  $metaKeyword = '';
} else if (empty($metaDescription)) {
  $metaDescription = '';
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<!-- Start SEO -->
<title><?php echo $metaTitile ?></title>
<meta name="keywords" content="<?php echo $metaKeyword ?>">
<meta name="description" content="<?php echo $metaDescription ?>">


<link rel="canonical" href="<?php echo getFullAddressUrl() ?>" />
<meta name="robots" content="index, follow">

<meta name="twitter:title" content="<?php echo $metaTitile ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="<?php echo $metaDescription ?>">
<meta name="twitter:image" content="./assets/img/npd-logo.jpeg">
<meta property="twitter:url" content="<?php echo getFullAddressUrl() ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo getFullAddressUrl() ?>">
<meta property="og:title" content="<?php echo $metaTitile ?>">
<meta property="og:description" content="<?php echo $metaDescription ?>">
<meta property="og:image" content="./assets/img/npd-logo.jpeg">
<meta property="og:site_name" content="<?php echo $metaTitile ?>" />

<link rel="icon" type="image/jpeg" sizes="492x422" href="./assets/img/npd-logo.jpeg">
<!-- End SEO -->

<!-- Change Mobile Browser Addres Bar -->
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#00335A">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#00335A">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#00335A">

<!-- Base URL -->
<?php
$localIpAddressArray = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $localIpAddressArray)) {
  $baseURL = "http://localhost/sass_npi_dev/";
} else {
  $baseURL = "https://brigadeproperties.in/sass_npi_dev/";
}
?>
<base href="<?php echo $baseURL ?>">
<!-- ./ Base URL -->
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- styles -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- owlCarousel2.3.4 -->
<link rel="stylesheet" href="assets/lib/OwlCarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/lib/OwlCarousel/assets/owl.theme.default.min.css">
<!-- lazyload -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

<link rel="stylesheet" href="assets/css/application.css">