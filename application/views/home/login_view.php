<div class="container">
	<div class="row">
		<div class="col-md-6 m-auto">

			<div class="card mt-5">
				  <div class="card-header">
				    <h3 class="text-center">USER LOGIN AREA</h3>
				  </div>
				  <div class="card-body">
					<!-- Email Sent Success Message -->
				  	<?php 
				  		if ($this->session->flashdata('message')) {

				  				echo '

								<div class="alert alert-success">'
									.$this->session->flashdata('message').
								'</div>

				  				';
				  		}
				  	?>
				    <form action="<?=base_url()?>user/login" method="POST">
						<fieldset>
							
							
							<div class="form-group">
								<label for="email">Your Email</label>
								<input type="text" name="email" class="form-control" id="email" value="<?=set_value('email');?>">
								<span class="text-danger"><?=form_error('email')?></span>
							</div>

							<div class="form-group">
								<label for="passwd">Password</label>
								<input type="password" name="passwd" class="form-control" id="passwd" value="">
								<span class="text-danger"><?=form_error('passwd')?></span>
							</div>

							
							<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register">


						</fieldset>
					</form>
				  </div>
				</div>


			
		</div>
	</div>
</div>
		





