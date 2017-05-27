function eusermgmt(ebuttype,eid) {

        $.post("backevent.php",
        {
          eveDBType: ebuttype,
          eveID: eid
        },
        function(data,status){
            alert("Your request is : " + status);
			//window.setTimeout(function(){ window.location = "http://www.yoururl.com"; },3000);
			//location.reload();
			
			history.go(-1);
        });
		

}