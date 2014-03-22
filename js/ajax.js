function ajaxCall(method,url,data,callback){
$.ajax({
		type:method,
		url:url,
		data:data,
		success:function(result){
					if(callback === 'saveEventSearch'){
						saveEventSearch(result);
						hideLoader();
					}
				},
	});
}

function saveEventSearch(result){
	alert(result);
}

function showLoader(){
	$('.loader').show();
}

function hideLoader(){
	$('.loader').hide();
}

$(document).ready(function(){
	$('#event-search-button').bind('click',function(){
		if($('#email').val() !== 'Email Id'){
			var url = "database.php";
			var data = 'call=addEventSearch&persons='+$('#persons').val()+'&budget='+$('#budget').val()+'&eventType='+$('#event-type').val()+
					   '&country='+$('#country').val()+'&city='+$('#city').val()+'&email='+$('#email').val()+'&mobile='+$('#mobile').val();
			var method = "GET";
			showLoader();
			ajaxCall(method,url,data,'saveEventSearch');
		} else {
			alert('Please enter email id for recieving email....')
		}
	});
});