<div class="container">
	<div class="row" style="margin-top:50px;">
		<div class="span3" style="margin-top:10px;">
			<h4>My Account</h4>
			<hr>
			<ul class="nav nav-tabs nav-stacked">
			  	<li><a href="<?php echo base_url('dashboard');?>"><i class="icon-dashboard"></i>Dashboard</a></li>
			  	<li class="active"><a href="<?php echo base_url('my-account');?>"><i class="icon-user"></i>My Account Details</a></li>
			  	<li><a href="<?php echo base_url('my-order');?>"><i class="icon-list"></i>My Orders</a></li>
			  	<li><a href="#"><span class="label label-info">Soon</span><i class="icon-gift"></i>My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-warning"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span6-->
		<div class="span9">
			
			<h1>My Account Details</h1>
			<?php echo $this->session->flashdata('message');?>
			<?php echo validation_errors();?>
			<div class="widget-box">
				<div class="widget-title" style="height:35px;">
					<span class="icon"><i class="icon-user"></i></span>
					<h5>Profile Information</h5>
				</div><!--widget-title-->
				<div class="widget-content">
				<div class="row" style="margin-left:10px;">
						 <form method="POST" action="<?php echo base_url('my-account/profile/update');?>">
					 		<div class="span4">

					 			<!--first-name-->
					 		
				      <div class="control-group">
				        <label class="control-label">
				        	First Name
				      	<span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <input name="first_name" type="text" placeholder="First Name"
				    	    class="span4" value="<?php echo $customer_information['first_name'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      	<!--zip_code-->
				      <div class="control-group">
				        <label class="control-label">Zip Code</label>
				        <div class="controls">
				          <input name="zip_code" type="text" placeholder="Zip Code" class="span4" value="<?php echo $customer_information['zip_code'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      	 <!--telephone-->
				      <div class="control-group">
				        <label class="control-label">Telephone #</label>
				        <div class="controls">
				          <input name="telephone" type="text" placeholder="Telephone #" class="span4" value="<?php echo $customer_information['telephone'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->


				       <!--country-->
				      <div class="control-group">
				        <label class="control-label">Country</label>
				        <div class="controls">
				          <input name="country" type="text" placeholder="Country" class="span4" value="<?php echo $customer_information['country'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
				     	</div><!--span4-->

					 		<div class="span4">

					 		<!--last-name-->
				      
				      <div class="control-group">
				        <label class="control-label">
				        	Last Name
				        <span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <input name="last_name" type="text" placeholder="Last Name"
				    	    class="span4" value="<?php echo $customer_information['last_name'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--city-->
				      <div class="control-group">
				        <label class="control-label">City</label>
				        <div class="controls">
				          <input name="city" type="text" placeholder="City" class="span4" value="<?php echo $customer_information['city'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
					 		
				          <!--mobile-->
				      <div class="control-group">
				        <label class="control-label">Mobile #</label>
				        <div class="controls">
				          <input name="mobile" type="text" placeholder="Mobile #" class="span4" value="<?php echo $customer_information['mobile'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--website-->
				      <div class="control-group">
				        <label class="control-label">Website</label>
				        <div class="controls">
				          <input name="website" type="text" placeholder="Website" class="span4" value="<?php echo $customer_information['website'];?>">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
					</div><!--span4-->
					<div class="span8">
					 <!--address#1-->
				      
				      <div class="control-group">
				        <label class="control-label">
				        	Address
				      	<span class="label label-important">Required</span>
				        </label>
				        <div class="controls">
				          <textarea rows="5"class="span8" name="address" placeholder="Address # 1"><?php echo $customer_information['address'];?></textarea>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
				  <input type="submit" class="btn btn-primary" value="Update">
					</div><!--span8-->
					</form>
				</div><!--row-->
				</div><!--widget-content-->
			</div><!--widget-box-->
			<div class="widget-box">
				<div class="widget-title" style="height:35px;">
					<span class="icon"><i class="icon-lock"></i></span>
					<h5>Account Information</h5>
				</div><!--widget-title-->
				<div class="widget-content">
					<form method="POST" action="<?php echo base_url('my-account/account/update');?>">
						<div class="row" style="margin-left:10px;">
						<div class="span4">
							<!--current_password-->
							<?php echo form_error('current_password');?>
				      <div class="control-group">
				        <label class="control-label">Current Password</label>
				        <div class="controls">
				          <input name="current_password" type="password" placeholder="Current password" class="span4" value="" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
<!--Confirm Password-->
				      <?php echo form_error('reenter_password');?>
				      <div class="control-group">
				        <label class="control-label">Confirm Password</label>
				        <div class="controls">
				          <input name="reenter_password" type="password" placeholder="Re-enter password" class="span4"required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      
				    <input type="submit" class="btn btn-primary" value="Update">
						</div><!--span4-left-->
						<div class="span4">
							<!--New Password-->
				      <?php echo form_error('password');?>
				      <div class="control-group">
				        <label class="control-label">New Password</label>
				        <div class="controls">
				          <input name="password" type="password" placeholder="New password" class="span4" value="" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				          <!--Email-->
				      <?php echo form_error('email');?>
				      <div class="control-group">
				        <label class="control-label">Email</label>
				        <div class="controls">
				          <input name="email" type="email" placeholder="Email" class="span4" value="<?php echo $customer_information['email'];?>" required>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->
						</div><!--span4-right-->
						</div><!--row-->
					</form>
				</div><!--widget-content-->
			</div><!--widget-box-->
		</div><!--span9-->
	
	</div><!--row-->
</div><!--container-->

