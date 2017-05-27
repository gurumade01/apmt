$("#navui a").click(function(){
	$(this).addClass('activePage');
	
});

$(".notiftext").text(function(index, currentText) {
	return currentText.substr(0, 25);
});

/* 
	$(".notiftext").text(function() {
	var notifTextLen = $("this").val().length;
}).append(function(){
	if(notifTextLen > 25) {
		return " >>";
	}
});

*/

 


 var width1 = $(window).width();
 
	if (width1 <= 500) {
		/* 
			add class drop down right to ul notif
			dropdown-menu-center
		*/
		
		$(".ulnotif").addClass( "dropdown-menu-center" );
		
		alert(notifTextLen);
	} 
	

	function goBack() {
		window.history.back();
	}
	
	$(".backpage").click(function(){
		goBack();
	});