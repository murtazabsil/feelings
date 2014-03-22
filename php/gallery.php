<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Feelings Network India - Total Event Managment solution</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width,user-scalable=false">

<!-- Favicons -->
<link rel="shortcut icon" href="../favicon.ico">
<link rel="apple-touch-icon-precomposed" href="../apple-touch-icon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="../apple-touch-icon-57x57.html" />
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="../apple-touch-icon-72x72.html" />
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="../apple-touch-icon-114x114.html" />

<!-- Google Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300'
	rel='stylesheet' type='text/css'>

<!-- Base Stylesheet -->
<link rel="stylesheet" href="../css/base.css">
<link rel="stylesheet" class="alt" href=" ../css/theme-cyan.css">
<link rel="stylesheet" class="alt" href="../css/font-awesome.css"
	rel="stylesheet">
<link rel="stylesheet" class="alt" href="../css/font-awesome.min.css"
	rel="stylesheet">
<link rel="stylesheet" href="../css/common.css">
<link rel="stylesheet" href="../css/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="../css/owl-carousel/owl.theme.css">
<link rel="stylesheet" href="../css/owl-carousel/owl.transitions.css">
<link rel="stylesheet" href="../css/new-bootstrap-panel.css">

<!-- JQuery Plugin -->
<script type='text/javascript' src="../js/vendor/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../js/vendor/jquery.sticky.js"></script>
<script type="text/javascript" src="../js/vendor/jquery.appear.min.js"></script>
<script type='text/javascript' src="../js/vendor/bootstrap.min.js"></script>
<script type='text/javascript'
	src="../js/vendor/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type='text/javascript' src='../js/vendor/jquery.easing.1.3.js'></script>
<script type='text/javascript' src="../js/vendor/jquery.plugins.min.js"></script>
<script type='text/javascript' src="../js/vendor/jquery.nicescroll.js"></script>
<script type='text/javascript' src="../js/vendor/jquery.parallax-1.1.3.js"></script>
<script type='text/javascript' src="../js/vendor/jquery.validate.min.js"></script>
<script type='text/javascript' src="../js/vendor/owl.carousel.min.js"></script>
<script type='text/javascript' src="../js/vendor/jquery.fitvids.js"></script>
<script type='text/javascript' src="../tweet/jquery.tweet.js"></script>
<script type='text/javascript' src="../js/vendor/jflickrfeed.min.js"></script>
<script type='text/javascript'
	src="../js/vendor/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="../js/vendor/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/container-logic.js"></script>

<!-- JQuery Map UiPlugin -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="../assets/plugins/map/jquery.ui.map.min.js"></script>

<!-- JQuery Revolution Slider Plugin -->
<script
	src="../assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>

<script type='text/javascript' src="../js/main.js"></script>
<script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<!-- FilmStrip Slider JS -->
<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="../js/vendor/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="../js/vendor/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="../js/vendor/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="../css/jquery.galleryview-3.0-dev.css" />

<!-- End of FilmStrip Slider -->

<!-- Script to set the active page -->
<script type="text/javascript">
$(document).ready(function(){
$('#aboutus-gallery').parent().addClass('active');
});
</script>
<!-- End of script -->
</head>
<body class="wide">
<div id="main-wrapper"><!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]--></div>
<!-- Mod Header start-->
<?php include('header.php')?>
<!-- MOD header end-->
<!-- Slider Wrapper -->
<div class="slider-wrap slider-wrap-no-margin non-home-page"><!-- Slider Container -->
<section id="first" class="parallax recent" data-speed="2"
	data-type="background" style="background-position: 50% 8px;"> <article>
<?php include 'card-slider.php';?>
<div class="dark-grey">
<h3 align="center">Our Gallery</h3>
</div>
<!-- </div> -->
<div id="our-gallery-carousel-wrapper">
<?php 
$device = $_SERVER['HTTP_USER_AGENT'];
if($device == 'Android' || $device == 'iPhone'){
print '<div id="our-gallery-carousel" style="height:300px;">';
$div = getGalleryImagesDiv();
print $div;
print '</div>';
} else {
print '<ul id="our-gallery-carousel">';
$li = getGalleryImagesLi();
print $li;
print '</ul>';
}
?>
</div>
</article> </section> <!-- END Slider Container --></div>

<!-- <div class="container">
<div class="row">
<div class="span12">-->
<!-- <div class="span12">
<div class="spacer">&nbsp;</div>
</div>
</div>
</div> -->
<?php include 'footer.php'?>
<!-- Gallery content ends here -->
<div id="back-top" style="display: block;"><a href="#top"
	class="img-circle"> <i class="fa fa-angle-up"></i> </a></div>
</div>
</body>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</body>
</html>