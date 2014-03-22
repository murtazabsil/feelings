<section id="event-search">
<article>
<div class="container">
<div class="row show-grid">
<div class="span2" style="@media (min-width : 800px ){margin-left: 70px;}">
<h3>EVENT SEARCH</h3>
</div>
<div class="span4">
<input type="hidden" value="MURTAZA KHAN">
<select id="persons">
<?php
$options = getPersons();
print $options; 
?>
</select>
<select id="budget">
<?php
$options = getBudget();
print $options; 
?>
</select>
<select id="event-type">
<?php
$options = getEventType();
print $options; 
?>
</select>
</div>
<div class="span4">
<select id="country">
<?php
$options = getCountry();
print $options; 
?>
</select>
<select id="city">
<?php
$options = getCity();
print $options; 
?>
</select>
<input type="text" id="email" value="Email Id">
</div>
<div class="span2">
<input type="text" id="mobile" value="Mobile No">
<button id="event-search-button" type="button" class="btn btn-success">Go</button>
</div>
</div>
</div>

<!-- <div class="container">
<div class="row">

</div>
</div>

<div class="container">
<div class="row">

</div>
</div>
<div class="container">
<div class="row">

</div>
</div>
<div class="container">
<div class="row">

</div>
</div> -->
</section>
</article>