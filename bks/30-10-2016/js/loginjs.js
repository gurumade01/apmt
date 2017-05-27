	$( "#other" ).click(function() {
	  var userid = $("#reguserid").val();
	  if(userid=="") {
		$(".errclass").empty();
		$(".phpgot").empty();
		var emptyerr = "<span class='errclass'> Enter your user id </span>";   
		$("#reguserid").after(emptyerr);
	  } else {
		//$( "#target" ).submit();
		$.post("forgetpass.php",
		{
			usermail: userid,
			uid: "123"
		},
		function(data, status){
			$(".phpgot").html(data);
		});
		
	  }
	});