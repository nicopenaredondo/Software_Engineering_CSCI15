<div class="container">
	<div class="row" style="margin-top:50px;">
		<div class="span3" style="margin-top:10px;">
			<h4>My Account</h4>
			<hr>
			<ul class="nav nav-tabs nav-stacked">
				<li class="active"><a href="<?php echo base_url('dashboard');?>"><i class="icon-dashboard"></i>Dashboard</a></li>
			  	<li><a href="<?php echo base_url('my-account');?>"><i class="icon-user"></i>My Account Details</a></li>
			  	<li><a href="<?php echo base_url('my-order');?>"><i class="icon-list"></i>My Orders</a></li>
			  	<li><a href="#"><span class="label label-info">Soon</span><i class="icon-gift"></i>My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-warning"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span3-->
		<div class="span9">
			
			<h1>Account Overview</h1>
			<h6>Hello, <?php echo ucwords($this->session->userdata('username'));?></h6>
			<p style="align:justify;">
				From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
			</p>

			<div class="widget-box">
				<div class="widget-title" style="height:30px;">
					<span class="icon"><i class="icon-signal"></i></span>
					<h5>Account Statistics</h5>
				</div><!--widget-title-->
				<div class="widget-content">
					<div class="stat-container">
										
					<div class="stat-holder">						
						<div class="stat">							
							<span>564</span>							
							Lorem						
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>423</span>							
							Ipsum						
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>96</span>							
							Dolor						
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>2</span>							
							Amet						
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
				</div>							
				</div><!--widget-content-->
			</div><!--widget-box-->
		</div><!--span6-->
	
	</div><!--row-->
</div><!--container-->

