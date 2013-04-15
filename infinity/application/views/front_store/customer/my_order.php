<div class="container">
	<div class="row" style="margin-top:50px;">
		<div class="span3" style="margin-top:10px;">
			<h4>My Account</h4>
			<hr>
			<ul class="nav nav-tabs nav-stacked">
				<li><a href="<?php echo base_url('dashboard');?>"><i class="icon-dashboard"></i>Dashboard</a></li>
			  	<li><a href="<?php echo base_url('my-account');?>"><i class="icon-user"></i>My Account Details</a></li>
			  	<li class="active"><a href="<?php echo base_url('my-order');?>"><i class="icon-list"></i>My Orders</a></li>
			  	<li><a href="#"><span class="label label-info">Soon</span><i class="icon-gift"></i>My Wishlist</a></li>
			</ul>
			<a style="margin-left:40px;"href="" class="btn btn-warning"><i class="icon-check"></i>Go Shopping!</a>
		</div><!--span6-->
		<div class="span9">
			
			<h1>My Orders</h1>
			<?php echo $this->session->flashdata('message');?>
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

