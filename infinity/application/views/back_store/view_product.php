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
			    <pre style="background-color:black;color:green;"><?php print_r($product_information);?></pre>
			  	<pre style="background-color:black;color:green;"><?php print_r($list_all_category);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->
			<?php echo $this->session->flashdata('message');?>
			<h3>Product Information</h3>
			<hr>	
			<form method="POST" action="<?php echo base_url('admin/product/modify');?>">
			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<input type="hidden" name="product_id" value="<?Php echo $product_information['product_id'];?>">
					<!--product-name-->
					<?php echo form_error('product_name');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Name
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				      <input name="product_name" type="text" placeholder="Product Name" class="span6" value="<?php echo $product_information['product_name'];?>" >
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				  <!--product-description-->
					<?php echo form_error('product_description');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Description
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<textarea rows="5" name="product_description" type="text" placeholder="Product Description" class="span6" required><?php echo $product_information['product_description'];?></textarea>
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				    <!--blog-slug-->
					<?php echo form_error('product_slug');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Slug
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<input name="product_slug" type="text" placeholder="product Slug" class="span6" value="<?php echo $product_information['product_slug'];?>">
  						<input name="hidden_slug" type="hidden" placeholder="product Slug" class="span6" value="<?php echo $product_information['product_slug'];?>">
  					<p class="help-block"><span class="label label-info">Example : http://www.example.com/<i><u>product_title_here</u></i></span></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				   <!--product-category-->
					<?php echo form_error('category_id');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Category
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<select name="category_id" class="span3" required>
				  				<option>----SELECT CATEGORY----</option>
				  			<?php foreach($list_all_category as $category):?>
				  				<?php if($product_information['category_id'] == $category['category_id']):?>
				  					<option value="<?php echo $category['category_id'];?>" selected><?php echo $category['category_name'];?></option>
				  				<?php else:?>
				  					<option value="<?php echo $category['category_id'];?>" ><?php echo $category['category_name'];?></option>
				  				<?php endif;?>
				  			<?php endforeach;?>
				  		</select>
  					<p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				    <!--product-price-->
					<?php echo form_error('product_price');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Price
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<div class="input-prepend">
							  <span class="add-on">₱</span>
							  <input name="product_price" class="span2" id="prependedInput" type="number" placeholder="Product Price" value="<?php echo $product_information['product_price'];?>" required>
							</div>
  <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				   <!--product-quantity-->
					<?php echo form_error('product_stock_quantity');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Product Stock Quantity
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<div class="input-prepend">
							  <span class="add-on">#</span>
							  <input name="product_stock_quantity" class="span2" id="prependedInput" type="number" placeholder="Product Quantity" value="<?php echo $product_information['product_stock_quantity'];?>" required>
							</div>
  <p class="help-block"></p>
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