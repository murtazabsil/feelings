<?php
function gallery_sliding_images($images){
	$div = '';
	foreach ($images as &$image){
		$div = $div.'<div class="span4">
<div class="portfolio-wrap"><a href="'.$image.'"
	class="fancybox" data-fancybox-group="gallery"
	title="Lorem ipsum dolor sit amet"> <span class="item-on-hover"><span
	class="hover-image"><i class="fa fa-search fa-2x"></i></span></span> <img
	src="'.$image.'" alt=""> </a>
<p>COMING SOON.....</p>
<div class="port-icon"><span><i class="fa fa-picture-o"></i></span></div>
</div></div>';
	}
	return $div;
}
?>