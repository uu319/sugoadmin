<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Reports - My Wallet</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	<center>
	<div class="jumbotron bg-default" style="max-width:350px; border-radius:5px;border-style:groove;">
		<div class="container">
			<?php if(!empty($data)){ ?>
			<p><b>SUGOPH Cash-in Flow</b></p>
			<?php $cashInFlow = 0; foreach($data as $d){
			$cashInFlow += ($d['total_fee']);
		} echo "<h3 style='text-decoration:underline;'>Php ".number_format($cashInFlow, 2)."</h3>"; ?><br>
			<p><b>SUGOPH Wallet</b></p>
			<?php $myWallet = 0; foreach($data as $d){
			$myWallet += ($d['booking_fee'] * .30);
			} echo "<h3 style='text-decoration:underline;'>Php ".number_format($myWallet, 2)."</h3>"; ?>
		<?php } else{ "echo <h3>No transaction yet</h3>"; } ?>
		</div>
	</div>
	</center>
</div>

<script>
    document.getElementById("reportsMyWallet").style.color = "white";
    document.getElementById("reportsMyWallet").style.backgroundColor = "#369369";
    //document.getElementById("reportsMyWallet").style.borderRadius = "5px";
</script>
