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
			  <li><a href="<?php echo base_url('my-order');?>">My Orders</a></li>
			  <li><a href="<?php echo base_url('my-wishlist');?>">My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-info"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span6-->
		<div class="span9">
			<h1>Order Information</h1>
			<h6>Hello, Nico Penaredondo!</h6>
			<p style="align:justify;">
				From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
			</p>
			<?php echo $this->session->flashdata('message');?>
			<?php echo validation_errors();?>
			<table class="table table-hovered">
			<form method="POST" action="<?php echo base_url('admin/order/change-status');?>">
				<input type="hidden" name="order_reference_id" value="<?php echo $order_information['order_info']['order_reference_id'] ;?>">
				<thead>
					<th>Order ID</th>
					<th>Status</th>
					<th>Payment</th>
				</thead>
				<tbody>
					<td><?php echo $order_information['order_info']['order_reference_id'] ;?></td>
					<td><?php echo $order_information['order_info']['order_status_description'] ;?></td>
					<td><?php echo $order_information['order_info']['payment_method'] ;?></td>
				</tbody>
			</form>
			</table><!--table-->
			<table class="table table-hovered">
						<thead>
							<th>Name</th>
							<th>Category</th>
							<th>Quantity</th>
							<th>Price</th>
						</thead>
						<?php $total = 0;?>
						<?php foreach($order_information['list_of_products'] as $product):?>
						<tbody><?php $total += $product['product_price'] * $product['product_quantity'] ;?>
							<td><?php echo $product['product_name'];?></td>
							<td><?php echo $product['category_name'];?></td>
							<td><?php echo $product['product_quantity'];?></td>
							<td><?php echo $product['product_price'] * $product['product_quantity'];?></td>
						</tbody>
						<?php endforeach;?>
					</table><!--table-hovered-->
					<p style="text-align:left;">
						<b>Total Price : <?php echo $total;?></b>
					</p>
		</div><!--span9-->
	
	</div><!--row-->
</div><!--container-->

