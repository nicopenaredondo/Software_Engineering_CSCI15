
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
	    <pre style="background-color:black;color:green;"><?php print_r($list_all_customer);?></pre>
	  </div>
	</div><!--modal hide fade-->
		<!--debug mode-->
		<?php echo $this->session->flashdata('message');?>
		<h3 style="font-family: 'Roboto Condensed';">List of Customers
			<div class="input-prepend input-append pull-right" style="margin-top:5px;">
		      <span class="add-on">Customer Name :</span>
		      <input class="span7" id="appendedInputButtons" placeholder="Search Customer" type="text">
		      <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
		  	</div>
		</h3>
		<a href="#" class="btn btn-primary"><i class="icon-plus-sign"></i>Add New</a>
		<hr>
		<ul class="thumbnails">
		<?php foreach($list_all_customer as $customer):?>
		<li class="span4">
		  <div class="thumbnail">
		    <img src="http://placehold.it/320x200" alt="ALT NAME">
		    <div class="caption">
		      <h3><?php echo $customer['first_name'].' '.$customer['last_name'];?></h3>
		      <p align="center">
			  <a href="<?php echo base_url('admin/customer/'.$customer['id']);?>" class="btn btn-primary btn-block"><i class="icon-edit"></i>Modify</a>
		      <a href="<?php echo base_url('admin/customer/delete/'.$customer['id']);?>" class="btn btn-danger btn-block"><i class="icon-remove"></i>Delete</a>
		      </p>
		    </div>
		  </div>
		</li>
		<?php endforeach;?>
		</ul><!--thumbnails-->
			</div><!--span12-->
			</div><!--row-->
		</div><!--container-->

		