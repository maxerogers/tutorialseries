$(function(){
	if(window.location.search){
		
	}else{
		var os = $("#os").val();
		window.location.href = "?os="+os;
	}
});