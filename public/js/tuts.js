$('a[href^="#"]').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }

});

$(function(){
	var platform = navigator.platform.toUpperCase();
	if platform === "MACINTEL" {
		//will set tabs to mac by default
	}else if platform === "WINDOWS"{

	}else{
		//set linux to default
	}
});