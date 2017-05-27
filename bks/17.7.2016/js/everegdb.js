function eusermgmt(ebuttype,eid) {

        $.post("backevent.php",
        {
          eveDBType: ebuttype,
          eveID: eid
        },
        function(data,status){
            alert("Your request is : " + status);
			location.reload();
        });
		

}