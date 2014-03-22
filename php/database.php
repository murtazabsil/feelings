<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
if(isset($_GET['call'])){
$function = $_GET['call'];
if(function_exists($function)){
	call_user_func($function);
} else {
	print 'Failed to Send Data. Please try again...';
}
}
}
function connect_database(){
	/*$host = "68.178.143.80";
	$username = "feelnets";
	$password = "Feelnets!1";
	$dbname = "feelnets";*/
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "feelings";
	$conn = mysqli_connect($host,$username,$password,$dbname);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else {
		return $conn;
	}
}

function close_database_conn($conn){
	mysqli_close($conn);
}

function addToVisitors($conn,$ip_address,$hit,$session_id){
	$query = "INSERT INTO visitors (ip_address, hits, session_id)
	VALUES ('$ip_address',$hit,'$session_id')";
	if (!mysqli_query($conn,$query))
	{
		die('Error: ' . mysqli_error($conn));
	}
}

function updateToVisitors($conn,$ip_address,$hit){
	$query = "UPDATE visitors
			 SET hits = $hit
			 WHERE ip_address = '$ip_address'";
	if (!mysqli_query($conn,$query))
	{
		die('Error: ' . mysqli_error($conn));
	}
}

function logicToUpdateHitsToDatabase($conn,$ip_address,$session_id){
	$query = "SELECT hits from visitors where ip_address = '$ip_address'";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	$hits = 0;
	if($numResults > 0){
		$query = "SELECT SUM(hits) as total from visitors";
		$session_result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($session_result))
		{
			$hits = $row["total"];
		}
	} else {
		addToVisitors($conn, $ip_address, 1, $session_id);
		$query = "SELECT SUM(hits) from visitors";
		$session_result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($session_result))
		{
			$hits = $row["hits"];
		}
	}
	return $hits;
}

function getEventType(){
	$conn = connect_database();
	$option = '';
	$query = "SELECT event_type_id,event_type_name from event_type";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$option_id = $row["event_type_id"];
			$option_name = $row["event_type_name"];
			$option = $option.'<option value="'.$option_id.'">'.$option_name.'</option>';
		}
	}
	return $option;
}

function getCountry(){
	$conn = connect_database();
	$option = '';
	$query = "SELECT country_id,country_name from country";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$option_id = $row["country_id"];
			$option_name = $row["country_name"];
			$option = $option.'<option value="'.$option_id.'">'.$option_name.'</option>';
		}
	}
	return $option;
}

function getCity(){
	$conn = connect_database();
	$option = '';
	$query = "SELECT city_id,city_name from city";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$option_id = $row["city_id"];
			$option_name = $row["city_name"];
			$option = $option.'<option value="'.$option_id.'">'.$option_name.'</option>';
		}
	}
	return $option;
}

function getPersons(){
	$conn = connect_database();
	$option = '';
	$query = "SELECT person_id,persons_amt from persons";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$option_id = $row["person_id"];
			$option_name = $row["persons_amt"];
			if($option_id == 0){
			$option = $option.'<option value="'.$option_id.'">'.$option_name.'</option>';
			} else {
			$option = $option.'<option value="'.$option_id.'">'.$option_name.' Persons</option>';
			}
		}
	}
	return $option;
}

function getBudget(){
	$conn = connect_database();
	$option = '';
	$query = "SELECT budget_id,budget_amt from budget";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$option_id = $row["budget_id"];
			$option_name = $row["budget_amt"];
			if($option_id == 0){
			$option = $option.'<option value="'.$option_id.'">'.$option_name.'</option>';
			} else {
			$option = $option.'<option value="'.$option_id.'">'.$option_name.' Per Person</option>';
			}
		}
	}
	return $option;
}

function addEventSearch(){
	$persons = $_GET['persons'];
	$budget = $_GET['budget'];
	$event_type = $_GET['eventType'];
	$country = $_GET['country'];
	$city = $_GET['city'];
	$email = $_GET['email'];
	$mobile = $_GET['mobile'];
	
	$conn = connect_database();
	$query = "INSERT INTO event_search(persons,budget,event_type_id,country_id,city_id,email_id,mobile_no) 
			 VALUES ('$persons','$budget','$event_type','$country','$city','$email','$mobile')";
	
	if (!mysqli_query($conn,$query))
	{
		print 'Failed to Send Data. Please try again...';
	}
	print 'Email sent successfully...';
}

function getGalleryImagesLi(){
	$conn = connect_database();
	$li = '';
	$query = "SELECT image_name,image_type,image_desc FROM images";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$image_name = $row["image_name"];
			$image_type = $row["image_type"];
			$image_desc = $row["image_desc"];
			if($image_name != NULL){
				$desc = $image_desc == NULL ? '' : $image_desc;
				$li = $li.'<li><img src="../images/'.$image_type.'/'.$image_name.'" alt="'.$desc.'">';
			} 
		}
	}
	return $li;
}

function getGalleryImagesDiv(){
	$conn = connect_database();
	$li = '';
	$query = "SELECT image_name,image_type,image_desc FROM images";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$image_name = $row["image_name"];
			$image_type = $row["image_type"];
			$image_desc = $row["image_desc"];
			if($image_name != NULL){
				$desc = $image_desc == NULL ? '' : $image_desc;
				$li = $li.'<div class="item"><img src="../images/'.$image_type.'/'.$image_name.'" alt="'.$desc.'"></div>';
			} 
		}
	}
	return $li;
}

function getCardsDiv(){
	$conn = connect_database();
	$div = '';
	$query = "SELECT card_name,card_title,location FROM cards";
	$result = mysqli_query($conn,$query);
	$numResults = $result->num_rows;
	if($numResults > 0){
		while($row = mysqli_fetch_array($result))
		{
			$card_name = $row["card_name"];
			$card_title = $row["card_title"];
			$location = $row["location"];
			if($card_name != NULL){
				$desc = $card_title == NULL ? '' : $card_title;
				$div = $div.'<div class="portfolio-wrap-outer" style="margin: 0 5px">
				<div class="portfolio-wrap"><a href="../images/cards/'.$location.'"
					class="fancybox" data-fancybox-group="gallery"
					title="'.$desc.'"> <span class="item-on-hover"
					style="opacity: 0;"><span class="hover-image" style="opacity: 0;"><i
					class="fa fa-search fa-2x"></i></span></span> <img
					src="../images/cards/'.$location.'" height="200" width="200" alt=""> </a>
				<h3><a href="#">'.$card_name.'</a></h3></div></div>';
			} 
		}
	}
	return $div;
}

?>