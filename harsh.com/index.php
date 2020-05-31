<?php
	session_start();
	if(isset($_SESSION['UID'])){
		header("Location:dashboard/");
	}
?>
<html>
	<head>
		<title>Address Book</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6 text-center">
					<h1 class="title">Address Book</h1>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title">Welcome To Address Book</h1>
						</div>
						<div class="panel-body">
							<div class="conatiner">
								<div class="row" style="font-family: 'Baloo Bhaina', cursive;">
									<div class="col-sm-6">
										<button id="login" class="btn btn-lg btn-info" data-toggle="modal" data-target="#loginPop">Search Contact</button>
									</div>
									<div class="col-sm-6">
										<button id="register" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#registerPop">Add Contact</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
		<!-- Login Modal -->
		<div class="modal fade" id="loginPop" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h3>Search Contact</h3>
		        <p id="res"></p>
		      </div>
		      <div class="modal-body">
		        <form class="form-vertical" role="form" id="loginForm">		        	
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
		        			<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Search</label>
			        		<input type="text" placeholder="Search..">
			        		
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
	        		</form>
			    </div>
		      </div>
		    </div>    
		  </div>

		<!-- Registration Modal -->
		<div class="modal fade" id="registerPop" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h3>Add contact</h3>
		        <p id="resRegister"></p>
		      </div>
		      <div class="modal-body">
		        <form class="form-vertical" role="form" id="addContact">
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Name</label>
			        		<input type="text" class="form-control" name="name" id="name" autocomplete="off" required="" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Phone Number</label>
			        		<input type="number" class="form-control" name="number" id="number" autocomplete="off" required="" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Alternate Phone Number</label>
			        		<input type="number1" class="form-control" name="number1" id="number1" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Email</label>
			        		<input type="email" class="form-control" name="email" id="email" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>	
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Date Of Birth</label>
			        		<input type="Date" class="form-control" name="date" id="date" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>		        	
		        
		        <div class="modal-footer">
		        	<div class="col-sm-6">
		        		<input type="submit" value="Add Contact" name="submit" class="btn btn-success" id="regBtn" />
		        	</div>
		        	<div class="col-sm-6">
		        		<input type="reset" value="Reset" class="btn btn-danger" id="resetBtn" />
		        	</div>
	        		</form>
			    </div>
		      </div>
		      
		    </div>    
		  </div>
		</div>
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				//reset btn
				$('.btn-danger').click(function(){
					$('#res').text('');
					$('#resRegister').text('');
				}); 	
				//submit registration form
				$('#addContact').submit(function(){
					var formData = new FormData($(this)[0]);
					$.ajax({
				        url: 'register/',
				        type: 'POST',
				        data: formData,
				        async: true,
				        success: function (data) {
				            $('#resRegister').html(data);
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });
					$(this)[0].reset();
					return false;
				});  	
			});
		</script>
	</body>
</html>