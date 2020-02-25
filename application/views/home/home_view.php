<div class="container">
	<div class="row">
		<div class="col-md-6 m-auto">

			<div class="card mt-5">
				  <div class="card-header">
				    <h3 class="text-center">USER REGISTRATION</h3>
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
				    <form action="<?=base_url()?>user/registration" method="POST">
						<fieldset>
							
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" name="first_name" class="form-control" id="first_name" value="<?=set_value('first_name');?>">
								<span class="text-danger"><?=form_error('first_name')?></span>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" name="last_name" class="form-control" id="last_name" value="<?=set_value('last_name');?>">
								<span class="text-danger"><?=form_error('last_name')?></span>
							</div>

							<div class="form-group">
								<label for="email">Your Best Email</label>
								<input type="text" name="email" class="form-control" id="email" value="<?=set_value('email');?>">
								<span class="text-danger"><?=form_error('email')?></span>
							</div>

							<div class="form-group">
								<label for="passwd">Enter a Password</label>
								<input type="password" name="passwd" class="form-control" id="passwd" value="">
								<span class="text-danger"><?=form_error('passwd')?></span>
							</div>

							<div class="form-group">
								<label for="conf_passwd">Confirm Your Password</label>
								<input type="password" name="conf_passwd" class="form-control" id="conf_passwd" value="">
								<span class="text-danger"><?=form_error('conf_passwd')?></span>
							</div>

							<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register">


						</fieldset>
					</form>
				  </div>
				</div>


			
		</div>
	</div>
</div>
		





