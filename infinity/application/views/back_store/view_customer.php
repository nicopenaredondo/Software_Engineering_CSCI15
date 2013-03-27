<div class="container">
	<div class="row">
		<div class="span12">

			<div class="row">
			<!--debug mode-->
			<a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Debug Mode</a>
		 	<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Debugger</h3>
			  </div>
			  <div class="modal-body" style="height:200px;">
			    <pre style="background-color:black;color:green;"><?php print_r($customer_information);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->
			<?php echo $this->session->flashdata('message');?>
			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<h3>Profile Information</h3>
					<hr>
					 <form method="POST" action="<?php echo base_url('admin/customer/user-profile/modify');?>">
					 		<input type="hidden" name="user_id" value="<?php echo $customer_information['id'];?>">
					 		<!--first-name-->
					 		<?php echo form_error('first_name');?>
				      <div class="control-group">
				        
				        <label class="control-label">
				        	First Name
				      	<span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <input name="first_name" type="text" placeholder="First Name"
				    	    class="span6" value="<?php echo $customer_information['first_name'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--last-name-->
				      <?php echo form_error('last_name');?>
				      <div class="control-group">
				        <label class="control-label">
				        	Last Name
				        <span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <input name="last_name" type="text" placeholder="Last Name"
				    	    class="span6" value="<?php echo $customer_information['last_name'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--address#1-->
				      <?php echo form_error('address');?>
				      <div class="control-group">
				        <label class="control-label">
				        	Address
				      	<span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <textarea rows="5"class="span6" name="address" placeholder="Address # 1"><?php echo $customer_information['address'];?></textarea>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				    	<!--zip_code-->
				      <div class="control-group">
				        <label class="control-label">Zip Code</label>
				        <div class="controls">
				          <input name="zip_code" type="text" placeholder="Zip Code" class="span6" value="<?php echo $customer_information['zip_code'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--city-->
				      <div class="control-group">
				        <label class="control-label">City</label>
				        <div class="controls">
				          <input name="city" type="text" placeholder="City" class="span6" value="<?php echo $customer_information['city'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--telephone-->
				      <div class="control-group">
				        <label class="control-label">Telephone #</label>
				        <div class="controls">
				          <input name="telephone" type="text" placeholder="Telephone #" class="span6" value="<?php echo $customer_information['telephone'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--mobile-->
				      <div class="control-group">
				        <label class="control-label">Mobile #</label>
				        <div class="controls">
				          <input name="mobile" type="text" placeholder="Mobile #" class="span6" value="<?php echo $customer_information['mobile'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--country-->
				      <div class="control-group">
				        <label class="control-label">Country</label>
				        <div class="controls">
				          <input name="country" type="text" placeholder="Country" class="span6" value="<?php echo $customer_information['country'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--website-->
				      <div class="control-group">
				        <label class="control-label">Website</label>
				        <div class="controls">
				          <input name="website" type="text" placeholder="Website" class="span6" value="<?php echo $customer_information['website'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      	<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">reset</button>
						</div>
					</form>
				</div><!--span6-->

				<div class="span6">
					<h3>Account Information</h3>
					<hr>
					<form method="POST" action="<?php echo base_url('admin/customer/user-account/modify');?>">
						<input type="hidden" name="user_id" value="<?php echo $customer_information['id'];?>">
						
							<!--current_password-->
							<?php echo form_error('current_password');?>
				      <div class="control-group">
				        <label class="control-label">Current Password</label>
				        <div class="controls">
				          <input name="current_password" type="password" placeholder="Current password" class="span6" value="" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--New Password-->
				      <?php echo form_error('password');?>
				      <div class="control-group">
				        <label class="control-label">New Password</label>
				        <div class="controls">
				          <input name="password" type="password" placeholder="New password" class="span6" value="" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--Confirm Password-->
				      <?php echo form_error('reenter_password');?>
				      <div class="control-group">
				        <label class="control-label">Confirm Password</label>
				        <div class="controls">
				          <input name="reenter_password" type="password" placeholder="Re-enter password" class="span6"required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--Email-->
				      <?php echo form_error('email');?>
				      <div class="control-group">
				        <label class="control-label">Email</label>
				        <div class="controls">
				          <input name="email" type="email" placeholder="Email" class="span6" value="<?php echo $customer_information['email'];?>" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">reset</button>
							</div>
					</form>
				</div><!--span6-->
			</div><!--row-->


		</div><!--span12-->
	</div><!--row-->
</div><!--container-->