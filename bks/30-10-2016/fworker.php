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

<!-- Numbers for stat box -->
<?php include 'incl/testcount.php';?>

<?php urlredirect('/apmt/fworker.php','fworker.php?W'); ?>
	
	
	<!-- stats 	-->
	
		<div class="container">
			
			<div class=" progress adminprog">
			  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"
			  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
				Performance : 60%
			  </div>
			</div>

          <!-- Small boxes (Stat box) -->
          <div class="row">
		  
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $ACT; ?></h3>
                  <p>Today Due</p>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <a href="fadmcomp.php?comptype=ACT" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $ACE; ?></h3>
                  <p>Escalated</p>
                </div>
                <div class="icon">
                  <i class="fa fa-exclamation-triangle"></i>
                </div>
                <a href="fadmcomp.php?comptype=ACE" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $ACA; ?></h3>
                  <p>All</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cubes"></i>
                </div>
                <a href="fadmcomp.php?comptype=ACA" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo 0//$ACTM; ?></h3>
                  <p>Messages</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="fadmcomp.php?comptype=ACTM" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
		  
		  
		 
		  
	</div><!-- END STATBOX CONAINTER -->
	
	
	
  
  <br/>
	
	
	
	

<?php include 'incl/bottom.php'; ?>