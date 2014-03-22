$(document).ready(function(){

	$('#portfolio-slider-home').owlCarousel({
		items : 6,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3],
		pagination : false,
		navigation : true,
		navigationText : ["",""],
	});
	
	$('#home-gallery').owlCarousel({
		navigation : false, // Show next and prev buttons
		pagination : false,
		singleItem:true,
		autoPlay: 3000,
		stopOnHover: true,
	});
	
	if($('#our-gallery-carousel').length > 0){	
		if(navigator.userAgent.indexOf('Android') !== -1 || navigator.userAgent.indexOf('iPhone') !== -1){
			$('#our-gallery-carousel').owlCarousel({
				navigation : true, // Show next and prev buttons
				pagination : false,
				singleItem:true,
				autoPlay: 3000,
				stopOnHover: true,
				navigationText : ["",""],
			});
		} else {
			$('#our-gallery-carousel').galleryView({
			panel_width:1000,
			panel_height:500,
			transition_interval:2000,
			autoplay:true,
			});
		}
	}
	 
	function formatTitle(title, currentArray, currentIndex, currentOpts) {
	    return '<div id="tip7-title"><span><a href="javascript:;" onclick="$.fancybox.close();"><img src="/data/closelabel.gif" /></a></span>' + (title && title.length ? '<b>' + title + '</b>' : '' ) + 'Image ' + (currentIndex + 1) + ' of ' + currentArray.length + '</div>';
	}

	/*$("#home-gallery").fancybox({
		'showCloseButton'	: false,
		'titlePosition' 	: 'inside',
		'titleFormat'		: formatTitle
	});*/
	 
	$('#home-gallery .owl-controlls').css('display','none');
	 
	$('#gallery-anchor').bind ('click',function(){
		if($('#container #gallery').attr('already-called') === "0"){
			ajaxCall("GET","php/gallery.php","updateGalleryContainer");
		} else {
			$('#container>div').addClass('displaynone');
			$('#container #gallery').removeClass('displaynone');
		}
	});
	 
	 $('#home-anchor').bind('click',function(){ 	$('#container>div').addClass('displaynone');
			$('#container #home').removeClass('displaynone');
	});
	 
	$('#aboutus-anchor').bind('click',function(){
		if($('#container #about').attr('already-called') === "0"){
			ajaxCall("GET","php/about-us.php","updateAboutUsContainer");
		} else {
			$('#container>div').addClass('displaynone');
			$('#container #about').removeClass('displaynone');
		}
	});
});

function updateGalleryContainer(data){
	$('#container #gallery').html(data);
	$('#container #gallery').attr('already-called','1');
	$('#container>div').addClass('displaynone');
	$('#container #gallery').removeClass('displaynone');
}

function updateAboutUsContainer(data){
	$('#container #about').html(data);
	$('#container #about').attr('already-called','1');
	$('#container>div').addClass('displaynone');
	$('#container #about').removeClass('displaynone');
}

function ajaxCall(method,url,callbackFunction,data){
	$.ajax({
		type: 	method,
		url:	url,
		success:function(data){
			if(callbackFunction === "updateGalleryContainer"){
				updateGalleryContainer(data);
			}
			if(callbackFunction === "updateAboutUsContainer"){
				updateAboutUsContainer(data);
			}
		},
		error: 	function(e){
			console.log(e);
		}
	});
}