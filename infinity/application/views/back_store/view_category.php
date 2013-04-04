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
		          <pre style="background-color:black;color:green;"><?php print_r($category_information);?></pre>
		        </div>
		      </div><!--modal hide fade-->
		      <!--debug mode-->
			<?php echo $this->session->flashdata('message');?>
			<h3>Category Information</h3>
			<hr>	
			<form method="POST" action="<?php echo base_url('admin/category/modify');?>">
			<div class="row" style="margin-top:10px;">
				<input type="hidden" name="category_id" value="<?php echo $category_information['category_id']?>">
				<div class="span6" >
					<!--product-name-->
					<?php echo form_error('category_name');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Category Name
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				      <input name="category_name" type="text" placeholder="Category Name" class="span6" value="<?php echo $category_information['category_name'];?>">
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				  <!--category-description-->
					<?php echo form_error('category_description');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Category Description
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<textarea rows="5" name="category_description" type="text" placeholder="Category Description" class="span6"><?php echo $category_information['category_description'];?></textarea>
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				   <!--category-cslugy-->
					<?php echo form_error('category_slug');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Category Slug
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<input name="category_slug" type="text" placeholder="Category Slug" class="span6" value="<?php echo $category_information['category_slug'];?>">
  						<input name="hidden_slug" type="hidden" placeholder="Category Slug" class="span6" value="<?php echo $category_information['category_slug'];?>">
  					<p class="help-block"><span class="label label-info">Example : http://www.example.com/<i><u>category</u></i></span></p>
				    </div><!--control-label-->
				  </div><!--control-group-->
				  <div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save changes</button>
					  <button type="reset" class="btn">reset</button>
					</div>
				</div><!--span6-->
				</div><!--row-->
				</form>
				<div class="span6">
					
				</div><!--span6-->
			</div><!--row-->


		</div><!--span12-->
	</div><!--row-->
</div><!--container-->