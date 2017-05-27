<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>
<?php include 'incl/top.php'; ?>


	<?php include 'incl/navbars.php'; ?>
	<?php jumboHead('Raise Complaint','jcomp'); ?>



	<?php
		if(isset($_GET['cid'])) {
		
			$compId = $_GET['cid'];
			
			$query = "SELECT * FROM complaints where CID=".$compId." ORDER BY CDOR DESC, CSTATUS ASC " ;
		
			$result = mysqli_query($link,$query);
			
			if(mysqli_num_rows($result)) {
				$row=mysqli_fetch_array($result);
				
				$cid	=$row["CID"];
				$ctitle	=$row["CTITLE"];
				$cdesc	=$row["CDESC"];
				$cprio	=$row["CPRIO"];
				$cby	=$row["CBY"];
				$cto	=$row["CTO"];
				$careaid=$row["CAREAID"];
				$ccate	=$row["CCATE"];
				$csubcate=$row["CSUBCATE"];
				$cstatus=$row["CSTATUS"];
				$cnotes	=$row["CNOTES"];
				$cdor	=$row["CDOR"];

				$cstatus1 = compStatus($cstatus); // switch loop for status
				
			
			} else {
				echo "<h4>Raise Complaint</h4>";
				
				
			}
		}
	?>
	
	<?php include 'compback.php'; ?>
	
	<form name="rcompform" method="post">
	   <label for="compTitle">Complaint Title :</label><br/>
	  <input type="text" name="compTitle" id="compTitle" placeholder="Complaint Heading" value="<?php if(isset($compId)) { echo $ctitle;} else if(isset($_POST['name'])) {echo $_POST['name']; } else {echo "";}?>"/> <br/><br/>
	  
	  <label for="compDesc">Complaint Description</label><br/>
	  
	  <textarea name="compDesc" id="compDesc" rows="8" cols="40"><?php if(isset($compId)) { echo $cdesc;} else if(isset($_POST['name'])) {echo $_POST['name']; } else {echo "";}?></textarea> <br/><br/>
	  
	  
	  <label for="ccate">Category</label>
	  <select id="ccate" name="ccate" >
		<?php
			 $cateGet = "SELECT * FROM category WHERE CPARENT=0";
			 $ccate	=$row["CCATE"];
			 echo getCate($cateGet);
		?>
	  </select> <br/><br/>
	  
	  <label id="labcsubcate" for="csubcate">Sub-Category:</label>
	  <span id="getsubCat"></span>
	  
	  
	  
	  <label for="carea">Complaint Area :</label>
	  <input type="radio" name="carea" id="cmyapt" value="0" checked /> <span id="areac1">My Apartment</span> 
	  <input type="radio" name="carea" id="coutside" value="1"/> <span id="areac2">Outer Area / Others</span> <br/><br/>
			  
	  <label for="cprio">Priority Level :</label>
	  <select id="cprio" name="cprio">
		<option id="cp1" name="cp1" value="1">Immediate</option>
		<option id="cp2" name="cp2" value="2">By Tomorrow</option>
		<option id="cp3" name="cp3" value="3" selected>By weekend</option>
		<option id="cp4" name="cp4" value="4">Any time</option>
	  </select>
	  
	  <br/><br/>
	  
	  <input type="submit" name="csubBut" id="csubBut" value="Raise Complaint"/>
	  
	  
	</form>
	

<!-- jQuery 
<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="srcs/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $("#ccate").change(function(){
  
	var optval = $("#ccate option:selected").val();
	if(optval != 9999) {
		$.post("compback.php",
		{
			mainCate: optval
		},
		function(data, status){
		$("#getsubCat").html(data);

			var  backCate = data;
			if(backCate==0) {
				$("#getsubCat,#labcsubcate").css("display","none");
			} else {
				$("#getsubCat").html(backCate);
				$("#getsubCat,#labcsubcate").css("display","block");
			}
	
		});

	} else {
		$("#getsubCat,#labcsubcate").css("display","none");
	}

  });
</script>
</body>
</html>
