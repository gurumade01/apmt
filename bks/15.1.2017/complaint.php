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
	
	<div class="container">
	
		<form name="rcompform" method="post" role="form">
		  <div class="form-group">
		  <label for="compTitle">Complaint Title :</label><br/>
		  <input type="text" name="compTitle" class="form-control" id="compTitle" placeholder="Complaint Heading" value="<?php if(isset($compId)) { echo $ctitle;} else if(isset($_POST['name'])) {echo $_POST['name']; } else {echo "";}?>"/> 
		  </div>
		  
		  <div class="form-group">
		  <label for="compDesc">Complaint Description</label><br/>
		  <textarea name="compDesc" class="form-control" id="compDesc" rows="8" cols="40" placeholder="Complaint Details(Optional)"><?php if(isset($compId)) { echo $cdesc;} else if(isset($_POST['name'])) {echo $_POST['name']; } else {echo "";}?></textarea>
		  </div>
		  
		  <div class="form-group">
		  <label for="ccate">Category</label>
		  <select id="ccate" class="form-control" name="ccate" >
			<?php
				 $cateGet = "SELECT * FROM category WHERE CPARENT=0";
				 $ccate	=$row["CCATE"];
				 echo getCate($cateGet);
			?>
		  </select>
		  </div>
		  
		  <div class="form-group">
		  <label id="labcsubcate" for="csubcate">Sub-Category:</label>
		  <span id="getsubCat"></span>
		  </div>
		  
		  <div class="form-group">
		  <label for="carea">Complaint Area :</label> <br/>
		  <input type="radio" name="carea" id="cmyapt" value="0" checked /> <span id="areac1">My Apartment</span> 
		  <br/>
		  <input type="radio" name="carea" id="coutside" value="1"/> <span id="areac2">Outer Area / Others</span>
		  </div>
		  
		  <div class="form-group">
		  <label for="cprio">Priority Level :</label>
		  <select id="cprio" class="form-control" name="cprio">
			<option id="cp1" name="cp1" value="1">Immediate</option>
			<option id="cp2" name="cp2" value="2">By Tomorrow</option>
			<option id="cp3" name="cp3" value="3" selected>By weekend</option>
			<option id="cp4" name="cp4" value="4">Any time</option>
		  </select>
		  </div>
		  
		  
		  <input type="submit" name="csubBut" id="csubBut" class="btn btn-success" value="Raise Complaint"/>
		  
		  
		</form>
		
	</div>
	
	<br/>
	<br/>
	<br/>
	

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
