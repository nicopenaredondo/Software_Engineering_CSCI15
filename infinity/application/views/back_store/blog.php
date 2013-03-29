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
          <pre style="background-color:black;color:green;"><?php print_r($list_all_blog);?></pre>
        </div>
      </div><!--modal hide fade-->
      <!--debug mode-->
    <?php echo $this->session->flashdata('message');?>
      <h3 style="font-family: 'Roboto Condensed';">List of Blogs
        <div class="input-prepend input-append pull-right" style="margin-top:5px;">
          <span class="add-on">Blog title:</span>
          <input class="span7" id="appendedInputButtons" placeholder="Search Blog Post" type="text">
          <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
        </div>
      </h3>
    <a href="<?php echo base_url('admin/blog/add-new-blog');?>" class="btn btn-primary">Add New</a>
    <hr>  
    </div><!--span12-->
  </div><!--row-->
  <div class="row">
    <div class="span12">
      <?php if(!empty($list_all_blog)):?>
      <table class="table table-hover">
      <thead>
        <th>Blog ID</th>
        <th>Blog Title</th>
        <th>Blog Description</th>
        <th>URL</th>
        <th>Blog Posted</th>
        <th>Actions</th>
      </thead>
      <?php foreach($list_all_blog as $blog):?>
      <tbody>
        <td><?php echo $blog['blog_id'];?></td>
        <td><?php echo $blog['blog_title'];?></td>
        <td><?php echo strip_tags(word_limiter($blog['blog_content'],5));?></td>
        <td><?php echo '/'.$blog['blog_slug'];?></td>
        <td><?php echo $blog['blog_date'];?></td>
        <td>
          <div class="btn-group">
            <a href="<?php echo base_url('admin/blog/info/'.$blog['blog_slug']);?>" class="btn btn-primary "><i class="icon-edit"></i>Modify</a>
            <a href="<?php echo base_url('admin/blog/delete/'.$blog['blog_id']);?>" class="btn btn-danger"><i class="icon-remove"></i>Delete</a>
          </div><!--btn-group-->
        </td>
      </tbody>
      <?php endforeach;?>
      </table><!--table table-hover-->
      <?php else:?>
        <p style="text-align:center;">There are no blog inside the database</p>
      <?php endif;?>
      <div class="pull-right">
        <?php echo $paginate_links;?>
      </div><!--pull-right-->
    </div><!--span12-->
  </div><!--row-->
</div><!--container-->

