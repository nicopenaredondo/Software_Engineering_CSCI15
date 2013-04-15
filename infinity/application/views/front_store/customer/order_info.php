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
			<h1>Order Information</h1>
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

