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
			    <pre style="background-color:black;color:green;"><?php print_r($blog_information);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->
			<?php echo $this->session->flashdata('message');?>
			<h3>Blog Information</h3>
			<hr>	
			<form method="POST" action="<?php echo base_url('admin/blog/modify');?>">
			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<input type="hidden" name="blog_id" value="<?php echo $blog_information['blog_id'];?>">
					<!--blog-name-->
					<?php echo form_error('blog_title');?>
				  <div class="control-group">
				    <label class="control-label">
				    	Blog Title
				    	<span class="label label-important">Required</span>
				    </label>
				  	<div class="controls">
				      <input name="blog_title" type="text" placeholder="Blog Title" class="span6" value="<?php echo $blog_information['blog_title'];?>" required>
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
				  		<textarea id="blog_content" rows="5" name="blog_content" type="text" placeholder="Blog Content" class="span6" required><?php echo $blog_information['blog_content'];?></textarea>
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
				  		<input name="blog_slug" type="text" placeholder="Blog Slug" class="span6" value="<?php echo $blog_information['blog_slug'];?>">
  						<input name="hidden_slug" type="hidden" placeholder="Blog Slug" class="span6" value="<?php echo $blog_information['blog_slug'];?>">
  					<p class="help-block"><span class="label label-info">Example : http://www.example.com/<i><u>blog_title_here</u></i></span></p>
				    </div><!--control-label-->
				  </div><!--control-group-->


				    <!--blog-tags-->
					<?php echo form_error('blog_tags');?>
				  <div class="control-group">
				    <label class="control-label">
				     Tags
				    	
				    </label>
				  	<div class="controls">
				  		<input name="blog_tags" class="span6" id="prependedInput" type="text" placeholder="Blog Slug" value="<?php echo $blog_information['blog_tags'];?>">
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