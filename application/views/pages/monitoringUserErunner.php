<!--<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">-->
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Monitoring - Erunner Users</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		  
		  <div class="row">
			<div class="col-lg-8">
				
			</div>
			<div class="col-lg-4">
				<div id="password-group" class="input-group" style="margin-bottom:5px">
				<input id="myInput" class="form-control" placeholder="Search..." />
				<div class="input-group-addon"><span class="fa fa-search"></span></div>
			</div>
		  </div>
          <br>
		  
			<ul class="nav nav-tabs bg-light border">
			  <li class="nav-item">
				<a class="nav-link1" href="<?php echo base_url('index.php/sugoph/monitoringUser'); ?>">All</a>
			  </li>
			  <li class="nav-item">
				<a id="erunnerTab" class="nav-link1 active" href="<?php echo base_url('index.php/sugoph/monitoringUserErunner'); ?>">ERunner</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link1" href="<?php echo base_url('index.php/sugoph/monitoringUserEseeker'); ?>">ESeeker</a>
			  </li>
			</ul>
			
			<?php if(empty($user)) echo "<br><h5>NO ERUNNERS!</h5>"; else{ ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                  <thead class="table-header">
                      <tr class="text-uppercase">
                          <th width="3%" class="border">#</th>
                          <th>Lastname</th>
                          <th>Firstname</th>
                          <th>&nbsp</th>
                          <th>Status</th>
                          <th>Rating</th>
                          <th>Reports count</th>
                          <th>Activity</th>
						  <th>Action</th>
                      </tr>
                  </thead>
                  <?php $counter=0; foreach($user as $u): $counter++; ?>
                  <tbody id="myTable">
                      <tr class="text-uppercase">
                          <td width="3%" class="border"><?php echo $counter; ?></td>
                          <td><?php echo ucwords($u['lastname']); ?></td>
                          <td><?php echo ucwords($u['firstname']); ?></td>
                          <td><a class="open-AddBookDialog111" data-id="<?php echo $u['username']; ?>" href="#applicantDetail" data-toggle="modal">view info</a></td>
                          <td <?php if($u['status'] == 'banned') echo "class='text-danger'"; ?>><b><?php echo $u['status']; ?></td>
						  <td><?php echo ucwords($u['rating']); ?>/5</td>
						  <td><?php echo ucwords($u['report_count']); ?></td>
                          <!--<td><a class="btn btn-sm btn-success text-light open-AddBookDialog11" id="btnAccept" onclick="acceptErunner(event)" data-id="<?php echo $u['username']; ?>" href="">Accept</a><span class="text-muted open-AddBookDialog1"> | </span><a class="btn btn-sm btn-danger text-light open-AddBookDialog1" onclick="denyErunner()" data-id="<?php echo $u['username']; ?>" href="">Deny</a></td>-->
						  <td><a href="#">Errand</a></td>
						  <td><button <?php if($u['status'] == 'banned') echo "disabled"; ?> id="<?php echo $u['username']; ?>" onclick="btnBan(this.id)" style="width:80px" class="btn btn-sm btn-danger text-light" href=""><?php if($u['status'] == 'banned') echo "BANNED"; else echo "BAN"; ?></button></td>
                      </tr>
                  </tbody>
                  <?php endforeach;?>
              </table>
          </div>
          <?php } ?>
        </div>
		
<div class="modal fade" id="applicantDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light">
        <h5 class="modal-title" id="exampleModalLabel">User's Information</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="applicantUsername" id="applicantUsername" value="" class="form-control">
        <div id="details"></div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div> -->
    </div>
  </div>	

<script>
    document.getElementById("monitoringUser").style.color = "white";
    document.getElementById("erunnerTab").style.color = "white";
    document.getElementById("monitoringUser").style.backgroundColor = "#369369";
    document.getElementById("erunnerTab").style.backgroundColor = "#369369";
    //document.getElementById("monitoringUser").style.borderRadius = "5px";
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
        function btnBan(clicked_id){
			var username = clicked_id;
			let myUrl = 'banUser/' + username;
			console.log(myUrl);
			Swal({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
				$.ajax({
                    url: myUrl,
                    success:function(result){
                        result = JSON.parse(result);
                        console.log(result);
                        window.location = 'monitoringUserErunner';
                    },
                    error:function(){
                        console.log('error!');
                    }
                });
			  }
			})
        // var txt;
        /* if (confirm("Are you sure you want to deny this applicant?")) {
            // alert("You pressed OK!");
            $(document).on("click", ".open-AddBookDialog1", function (e) {
                e.preventDefault();
                var username = $(this).data('id');
                let myUrl = 'banUser/' + username;
                console.log(username);

                $.ajax({
                    url: myUrl,
                    success:function(result){
                        result = JSON.parse(result);
                        console.log('reached!');
                        window.location = 'monitoringUser';
                    },
                    error:function(){
                        console.log('error!');
                    }
                });
                // $(".modal-body #bookId").val( myBookId );
                // As pointed out in comments, 
                // it is superfluous to have to manually call the modal.
                // $('#addBookDialog').modal('show');
            });
        } */
    }
    </script>