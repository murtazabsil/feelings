<?php
require 'database.php';
$conn = connect_database();
$ip_address = $_SERVER['REMOTE_ADDR'];
$session_id = '';
$hits = 0;
if($conn){
	if(isset($_SESSION['session_id'])){
		$session_id = $_SESSION['session_id'];
	} else {
		$_SESSION['session_id'] = uniqid();
		$session_id = $_SESSION['session_id'];
	}
	$hits = logicToUpdateHitsToDatabase($conn, $ip_address, $session_id);
	close_database_conn($conn);
}
?>

<header>
<div class="container">
<div class="row">
<div class="span3 logo"><a href="home.php"><img src="../images/logo.png"
	alt="Feelings - Event Management Group"></a></div>
<div class="span9">
<div class="nav_bg">
<div class="navbar">
<div class="container">
<button data-target=".nav-collapse" data-toggle="collapse"
	class="btn btn-navbar collapsed" type="button"><span class="icon-bar"></span>
<span class="icon-bar"></span> <span class="icon-bar"></span></button>
<div class="navbar-collapse nav-collapse collapse" style="height: 0px;">
<ul class="nav">
	<li><a href = "home.php" id="home-anchor">Home</a></li>
	<li><a href = "about-us.php" id="aboutus-anchor">About Us</a></li>
	<li><a href="our-services.php">Our Services</a></li>
	<li><a href="wedding-planner.php">Wedding Planner</a></li>
	<li><a id="gallery-anchor" href="gallery.php">Gallery</a></li>
	<li><a href="#" title="Tab under construction.">Our Clients</a></li>
	<li><a href="#" title="Tab under construction.">The Team</a></li>
	<li><a href="#" title="Tab under construction.">Contact Us</a></li>
</ul>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<div class="top-bar">
<div class="container">
<div class="row">
<div class="span4tag">
<h6 small="">THE EVENT MANAGEMENT GROUP</h6>
</div>
<div class="span4tagline"
	style="margin-left: 0px; padding-top: 8px; padding-left: 5px;"><em>"We
believe in making things happen"</em></div>
<div id="visitor-count" style="float: right;;"><em style="color:red;">Visitor No :  <?php print $hits?></em></div>
</div>
</div>
</div>
</header>