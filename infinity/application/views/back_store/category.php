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
			    <pre style="background-color:black;color:green;"><?php print_r($list_all_category);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->
			<?php echo $this->session->flashdata('message');?>
			<h3 style="font-family: 'Roboto Condensed';">List of Category
			<div class="input-prepend input-append pull-right" style="margin-top:5px;">
		      <span class="add-on">Category name:</span>
		      <input class="span7" id="appendedInputButtons" placeholder="Search Order" type="text">
		      <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
		  	</div>
			</h3>
		<a href="<?php echo base_url('admin/category/add-new-category');?>" class="btn btn-primary">Add New</a>
		<hr>	
		</div><!--span12-->
	</div><!--row-->
	<div class="row">
		<div class="span12">
			<?php if(!empty($list_all_category)):?>
			<table class="table table-hover">
			<thead>
				<th>Category ID</th>
				<th>Category Name</th>
				<th>Category Description</th>
				<th>URL</th>
				<th>Actions</th>
			</thead>
			<?php foreach($list_all_category as $category):?>
				<tbody>
					<td><?php echo $category['category_id'];?></td>
					<td><?php echo $category['category_name'];?></td>
					<td><?php echo word_limiter($category['category_description'],10);?></td>
					<td><?php echo '/'.$category['category_slug'];?></td>
					<td width="10%">
						<div class="btn-group">
	            <a href="<?php echo base_url('admin/category/info/'.$category['category_slug']);?>" class="btn btn-primary "><i class="icon-edit"></i>Modify</a>
	            <a href="<?php echo base_url('admin/category/delete/'.$category['category_slug']);?>" class="btn btn-danger"><i class="icon-remove"></i>Delete</a>
	          </div><!--btn-group-->
					</td>
				</tbody>
			<?php endforeach;?>
			</table><!--table table-hover-->	
			<?php else:?>
		        <p style="text-align:center;">There are no category inside the database</p>
		     <?php endif;?>
			<div class="pull-right">
        <?php echo $paginate_links;?>
      </div><!--pull-right-->
		</div><!--span12-->
	</div><!--row-->
</div><!--container-->

