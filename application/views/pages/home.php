<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Dashboard</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		  <?php 
			date_default_timezone_set('Asia/Manila');
			$allPending = 0;
			$newUsersToday = 0;
			foreach($user as $u){
				$datetime = strtotime($u['date_registered']);
				$dr = date('Y-m-d', $datetime);
				if($u['status'] == 'pending'){
					$allPending++;
				}
				if($dr == date('Y-m-d')){
					$newUsersToday++;
				}
				
			}
			$allUser = count($user);
			
			?>

          <div class="jumbotron bg-default" style="border-radius:5px;border-style:groove;">
			<div class="container">
				<h2><strong>Welcome, Administrator.</strong></h2>
				<a class="btn btn-primary" href="<?php echo base_url('index.php/sugoph/monitoringUser'); ?>">Manage users &raquo;</a>
			</div>
		  </div>
		  
			<div class="row justify-content-md-center">
				<div class="col col-lg-2"><center>
					<strong><p class="text-dark">
					Total users
					</p>
					<i class="bg-primary text-light count-num"><?php echo $allUser; ?></i>
					</strong>
					</center><br>
				</div>
				<div class="col col-lg-2"><center>
					<strong><p class="text-dark">
					New users today
					</p>
					<span class="bg-info text-light count-num"><?php echo $newUsersToday; ?></span>
					</strong>
					</center><br>
					</div>
				<div class="col col-lg-2"><center>
					<strong><p class="text-dark">
					Pending
					</p>
					<span class="bg-danger text-light count-num"><?php echo $allPending; ?></span>
					</strong>
					</center><br>
				</div>
				<div class="col col-lg-6"><center>
					<strong><p class="text-dark">
					&nbsp;
					</p>
					
					</strong>
					</center><br>
				</div>
			</div>
</div>