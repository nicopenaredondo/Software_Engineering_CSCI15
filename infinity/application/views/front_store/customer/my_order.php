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
				<li><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
			  <li><a href="<?php echo base_url('my-account');?>">My Account Details</a></li>
			  <li class="active"><a href="<?php echo base_url('my-order');?>">My Orders</a></li>
			  <li><a href="<?php echo base_url('my-wishlist');?>">My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-info"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span6-->
		<div class="span9">
			
			<h1>My Orders</h1>
			<h6>Hello, Nico Penaredondo!</h6>
			<p style="align:justify;">
				From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
			</p>
			<?php if(!empty($list_all_order)):?>
			<table class="table table-hover">
				<thead>
					<th>Order Reference ID</th>
					<th>Order Status</th>
					<th>Payment Method</th>
					<th>Order Date</th>
					<th>Actions</th>
				</thead>
				<?php foreach($list_all_order as $order => $data):?>
				<tbody>
					<td><?php echo $data['order_reference_id'];?></td>
					<td><span class="label label-warning"><?php echo $data['order_status_description'];?></span></td>
					<td><?php echo $data['payment_method'];?></td>
					<td><?php echo $data['order_date'];?></td>
					<td><a href="<?php echo base_url('my-order/info/'.$data['order_reference_id']);?>"class="btn btn-primary"><i class="icon-search"></i>View Order</a></td>
				</tbody>
				<?php endforeach;?>
			</table><!--table table-hover-->	
			<?php else:?>
			<p style="text-align:center;">There are no orders in your account</p>
			<?php endif;?>
		</div><!--span6-->
	
	</div><!--row-->
</div><!--container-->

