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
			    <pre style="background-color:black;color:green;"><?php print_r($order_information);?></pre>
			  	<pre style="background-color:black;color:green;"><?php print_r($list_all_order_status);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->
			<?php echo $this->session->flashdata('message');?>
			<div class="row">
				<div class="span7">
					<h3>Order Information</h3>
					<hr>
						<table class="table table-hovered">
							<form method="POST" action="<?php echo base_url('admin/order/change-status');?>">
							<input type="hidden" name="order_reference_id" value="<?php echo $order_information['order_info']['order_reference_id'] ;?>">
							<thead>
								<th>Order ID</th>
								<th>Name</th>
								<th>Status</th>
								<th>Payment</th>
							</thead>
							<tbody>

								<td><?php echo $order_information['order_info']['order_reference_id'] ;?></td>
								<td><?php echo $order_information['order_info']['first_name'].' '.$order_information['order_info']['last_name'] ;?></td>
								<td>
									<select name="order_status">
										<?php foreach($list_all_order_status as $status):?>
										<?php if($status['order_status_description'] == $order_information['order_info']['order_status_description']):?>
											<option value="<?php echo $status['order_status_id'];?>" selected><?php echo $status['order_status_description'];?></option>
										<?php else:?>
											<option value="<?php echo $status['order_status_id'];?>"><?php echo $status['order_status_description'];?></option>
										<?php endif;?>
										<?php endforeach;?>
									</select><!--order_status-->
								</td>
								<td><?php echo $order_information['order_info']['payment_method'];?></td>
							</tbody>
							
						</table><!--table-->
						<div class="form-actions">
						  <button type="submit" class="btn btn-primary">Update Status</button>
						</div>
						</form>
				</div><!--span6-->
				<div class="span5">
					<h3>Product List</h3>
					<hr>	
					<?php echo validation_errors();?>
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
				</div><!--span5-->
			</div><!--row-->


		</div><!--span12-->
	</div><!--row-->
</div><!--container-->