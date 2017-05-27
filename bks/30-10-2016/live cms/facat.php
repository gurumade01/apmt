<?php require_once "incl/dbconn.php" ;?>
<?php require_once "incl/func.php" ;?>

<?php
	if(isset($_SESSION['userlogid'])) {
		
		$userlogid = $_SESSION['userlogid'];
		
	} else {
		
		$userlogid = 9999;
	}
?>

<?php include 'incl/top.php'; ?>
<!-- TOP NAV -->
<?php include 'incl/adminnav.php';?>

<?php jumboHead('Category Management','jcon'); ?>


<div class="container-fluid">
	<div class="list-group subcate">
	  <a href="#" id="ccat" class="list-group-item"><i class="fa fa-plus-circle" aria-hidden="true"></i>Create New Category </a>
	  <a href="#" id="mcat" class="list-group-item"><i class="fa fa-tasks" aria-hidden="true"></i>Manage Category</a>
	</div>
</div>

<div class="container newcatcr">
	<h3 class="text-center"><u>Create New Category</u></h3>
	
	<form action="" method="POST" role="form">
	
		<div class="form-group">
			<label for="catname">New Category Name : </label>
			<input type="text" class="form-control" id="catname" name="catname" placeholder="enter category name">
		</div>
		
		
		<div class="form-group">
	
			<label>Select Category Type :</label>
			
			<div class="radio">
			  <label><input type="radio" id="cto1" name="cto" value="0" checked>Main Category</label>
				&nbsp;&nbsp;&nbsp;
			  <label><input type="radio" id="cto2" name="cto" value="1">Sub Category</label>
			  
			</div>
		
		</div>
		
		 <div class="form-group">
		  <label for="ccate">Under Which Category : </label>
		  <select id="ccate" class="form-control" name="ccate">
			<?php
				 $cateGet = "SELECT * FROM category WHERE CSTATUS=1";
				 $ccate	=$row["CCATE"];
				 echo getCate($cateGet);
			?>
		  </select>
		  </div>

	
		<button type="submit" class="btn btn-primary"><i class="fa fa-sitemap"></i> Create Category</button>
		
	</form>
	
	<br/>
</div>

<div class="container newcatcr">
	<h3 class="text-center"><u>Manage Category</u></h3>
	
		 <div class="form-group">
			  <label for="ccate">Select Category :</label>
			  <select id="ccate" class="form-control" name="ccate" >
				<?php
					 $cateGet = "SELECT * FROM category WHERE CPARENT=0";
					 $ccate	=$row["CCATE"];
					 echo getCate($cateGet);
				?>
			  </select>
		 </div>
		 
		 
</div>




<!-- body ends here  -->

		<!-- jQuery 
		<script src="http://code.jquery.com/jquery.js"></script>-->	
		<script src="srcs/jquery-1.11.3.min.js"></script>
		
		
		<!-- Bootstrap JavaScript 
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
		<script src="srcs/bs/js/bootstrap.min.js"></script>
	</body>
</html>