<?php 
	include_once "header.php";
	

?>

			<div class="row">
				<div class="col-md-7  maincontent">
				
				<h3>Welcome to college connect</h3>
				<p>Get connected to your college community</p>
				</div>


				<div class="col-md-4  login_sidebar">
				<img src="logo1.png" width=150px height=100px>
				
				<h6>LOGIN.........</h6>
						<form action="login_check.php" method="post">
							<div class="form-group has-warning">
								<label>Enter name<input type="text" class="form-control" name="name" required></label>
							</div>

							

							<div class="form-group has-warning">
								<label>Enter password<input type="password" class="form-control" name="password" required></label>
							</div>
								<input type="submit" name="" value="Login" class="btn btn-info">

								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
										New User : Register here	</button>
						</form>

												<!-- Modal -->
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												                    <img src="logo.png" width="180px" height="60px">
												                    <h4 class="modal-title" id="myModalLabel">User Registration</h4>
												      </div>
												      <div class="modal-body registration_form" >
												       
												                          <form action="save_registration.php" method="post">
												                            <div class="form-group has-warning">
												                              <label>Enter name<input type="text" class="form-control" name="name" required></label>
												                            </div>

												                            <div class="form-group has-warning">
												                              <label>Enter email<input type="email" class="form-control" name="email" required></label>
												                            </div>

												                            <div class="form-group has-warning">
												                              <label>Enter password<input type="password" class="form-control" name="password" required></label>
												                            </div>
												      </div>
												                      <div class="modal-footer">
												                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												                        <input type="submit" name="" value="Register" class="btn btn-primary">
												                        
												                      </div>

												                      </form>

												    </div>
												  </div>
												</div>
												<!--end of registration model-->
							
												<?php
											     if(isset($_GET["registered"])){
											     	echo "Successfully Registered !!";
											     }

											      if(isset($_GET["Invalid"])){
											     	echo "Invalid login credentials";
											     }
											    ?> 




						
				</div>
			
			</div>

		

<?php 
	require "footer.php";
?>