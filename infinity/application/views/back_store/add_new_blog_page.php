<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->session->flashdata('message');?>
			<h3>Add new blog</h3>
			<hr>	
			<form method="POST" action="<?php echo base_url('admin/blog/new');?>">
			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<!--blog-name-->
					<?php echo form_error('blog_title');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Blog Title
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				      <input name="blog_title" type="text" placeholder="Blog Title" class="span6" value="<?php echo set_value('blog_title');?>" required>
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				  <!--blog-description-->
					<?php echo form_error('blog_content');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Blog Content
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<textarea id="blog_content" rows="5" name="blog_content" type="text" placeholder="Blog Content" class="span6" required><?php echo set_value('blog_content');?></textarea>
				      <p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				    <!--blog-tags-->
					<?php echo form_error('blog_tags');?>
				  <div class="control-group">
				    <label class="control-label">
				     Tags
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<input name="blog_tags" class="span6" id="prependedInput" type="text" placeholder="Blog Slug" value="<?php echo set_value('blog_tags');?>">
							<p class="help-block"></p>
				    </div><!--control-label-->
				  </div><!--control-group-->

				   <!--blog-slug-->
					<?php echo form_error('blog_slug');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Blog Slug
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				  		<input name="blog_slug" type="text" placeholder="Blog Slug" class="span6" value="<?php echo set_value('blog_slug');?>">
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