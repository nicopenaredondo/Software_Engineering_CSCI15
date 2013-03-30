<div class="container">
	<div class="row">
	<div class="span12">
		 <!--debug mode-->
      <a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Debug Mode</a>
      <!-- Modal -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Debugger</h3>
        </div>
        <div class="modal-body" style="height:200px;">
          <pre style="background-color:black;color:green;"><?php print_r($list_all_order);?></pre>
        </div>
      </div><!--modal hide fade-->
      <!--debug mode-->
    <?php echo $this->session->flashdata('message');?>
		<h3 style="font-family: 'Roboto Condensed';">List of Orders
			<div class="input-prepend input-append pull-right" style="margin-top:5px;">
		      <span class="add-on">Reference #</span>
		      <input class="span8" id="appendedInputButtons" placeholder="Search Order" type="text">
		      <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
		  </div>
		</h3>
	</br>
		
		<hr>
	</div><!--span12-->
	</div><!--row-->
	<div class="row">
		<div class="span12">
			<?php if(!empty($list_all_order)):?>
			<table class="table table-hover">
			<thead>
				<th>Order Reference ID</th>
				<th>Customer Name</th>
				<th>Order Status</th>
				<th>Payment Method</th>
				<th>Order Date</th>
				<th>Actions</th>
			</thead>
			<?php foreach($list_all_order as $order):?>
			<tbody>
				<td><?php echo $order['order_reference_id'];?></td>
				<td><?php echo $order['first_name'].' '.$order['last_name'] ;?></td>
				<td><span class="label label-warning"><?php echo $order['order_status_description'];?></span></td>
				<td><?php echo $order['payment_method'];?></td>
				<td><?php echo $order['order_date'];?></td>
				<td>
          <div class="btn-group">
            <a href="<?php echo base_url('admin/order/info/'.$order['order_reference_id']);?>" class="btn btn-primary "><i class="icon-edit"></i>Modify</a>
            <a href="<?php echo base_url('admin/order/delete/'.$order['order_reference_id']);?>" class="btn btn-danger"><i class="icon-remove"></i>Delete</a>
          </div><!--btn-group-->
        </td>
			</tbody>
			<?php endforeach;?>
		</table><!--table table-hover-->	
		<?php else : ?>
			<p style ="text-align:center;">There are no product inside the database</p>
	  	<?php endif;?>
	  	<div class="pull-right">
        	<?php echo $paginate_links;?>
        </div><!--pull-right-->
		</div><!--span12-->
	</div><!--row-->
</div><!--container-->

