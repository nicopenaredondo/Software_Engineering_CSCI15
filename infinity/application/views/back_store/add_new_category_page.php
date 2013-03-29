<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->session->flashdata('message');?>
			<h3>Category Information</h3>
			<hr>	
			<form method="POST" action="<?php echo base_url('admin/category/new');?>">
			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<!--product-name-->
					<?php echo form_error('category_name');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Category Name
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				      <input name="category_name" type="text" placeholder="Category Name" class="span6" value="<?php echo set_value('category_name');?>">
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
				  		<textarea rows="5" name="category_description" type="text" placeholder="Category Description" class="span6"><?php echo set_value('category_description');?></textarea>
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
				  		<input name="category_slug" type="text" placeholder="Category Slug" class="span6" value="<?php echo set_value('category_slug');?>">
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