<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Reports - Users</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
          
          
		  <?php if(empty($report)) echo "<h5>NO REPORTS!</h5>"; else{ ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead class="bg-success text-light">
                </thead>
                <?php $counter=0; foreach($report as $a): $counter++; 
					if($a['action'] == 'suspended'){
						$status = "suspended";
						$status_color = "text-warning";
					}
					else if($a['action'] == "banned"){
						$status = "banned";
						$status_color = "text-danger";
					}
					else{
						$status = "reactivated";
						$status_color = "text-success";
					}
				?>
                <tbody>
                    <tr>
                        <td width="3%" class="border"><?php echo $counter; ?></td>
                        <td class="border"><?php echo ucwords($a['firstname'])." ".ucwords($a['lastname'])."'s account <strong>[{$a['to']}]</strong> has been <strong><span class='$status_color'>".strtoupper($a['action'])."</span></strong> by ".$a['from']." on ".$a['date']; ?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
            <div id="data"></div>
          </div>
		  <?php } ?>
         
        </div>
    </div>

<script>
    document.getElementById("reportsUser").style.color = "white";
    document.getElementById("reportsUser").style.backgroundColor = "#369369";
    //document.getElementById("reportsUser").style.borderRadius = "5px";
</script>