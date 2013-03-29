<div class="container">
	<div class="row" style="margin-left:5px;margin-top:20px;">
		<img class="pull-left" src="<?php echo base_url('assets/images/lol.png');?>" style="width:200px;height:80px;">
		<div class="btn-group pull-right" style="margin-top:25px;">
			
			<a class="btn" href="#">
				<i class="icon-globe"></i><span class="hidden-phone hidden-tablet"> Notifications</span> <span class="label label-important hidden-phone">2</span>
			</a>

			<a class="btn" href="#">
				<i class="icon-shopping-cart"></i><span class="hidden-phone hidden-tablet"> Cart</span> <span class="label label-important hidden-phone">2</span>
			</a>

			<!-- start: User Dropdown -->
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user"></i><span class="hidden-phone hidden-tablet"> Yo' Mama</span>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">Profile</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url('dashboard/logout');?>">Logout</a></li>
			</ul>
			<!-- end: User Dropdown -->
		</div>
	</div><!--row-->
	<div class="row" style="margin-top:50px;">
		<div class="span3" style="margin-top:10px;">
			<h4>My Account</h4>
			<hr>
			<ul class="nav nav-tabs nav-stacked">
			  <li><a href="#">My Account Details</a></li>
			  <li><a href="#">My Address Book</a></li>
			  <li><a href="#">My Orders</a></li>
			  <li><a href="#">My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-warning"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span6-->
		<div class="span9">
			
			<h1>Account Overview</h1>
			<h6>Hello, Nico Penaredondo!</h6>
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