<div class="row" style="margin-top:10px;">
<div class="span6" >
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Basic Information</a></li>
    <li><a href="#tab2" data-toggle="tab">SEO</a></li>
  </ul><!--NAVTABS-->
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <form method="POST" action="<?php echo base_url('admin/blog/modify');?>">
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
        </form>
    </div><!--TAB-PANE-->
    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div><!--TAB-PANE-->
  </div><!--TAB-CONTENT-->
</div><!--TABBABLE-->
</div><!--span6-->
</div><!--row-->