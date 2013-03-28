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
          <pre style="background-color:black;color:green;"><?php print_r($list_all_products);?></pre>
        </div>
      </div><!--modal hide fade-->
      <!--debug mode-->
    <?php echo $this->session->flashdata('message');?>
      <h3 style="font-family: 'Roboto Condensed';">List of Products
        <div class="input-prepend input-append pull-right" style="margin-top:5px;">
          <span class="add-on">Product name :</span>
          <input class="span7" id="appendedInputButtons" placeholder="Search Order" type="text">
          <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
        </div>
      </h3>
    <a href="#" class="btn btn-primary">Add New</a>
    <hr>  
    </div><!--span12-->
  </div><!--row-->
  <div class="row">
    <div class="span12">
      <table class="table table-hover">
      <thead>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th>Category</th>
        <th>Actions</th>
      </thead>
      <?php foreach($list_all_products as $product):?>
      <tbody>
        <td><?php echo $product['product_id'];?></td>
        <td><?php echo $product['product_name'];?></td>
        <td><?php echo word_limiter($product['product_description'],10);?></td>
        <td><?php echo '₱'.$product['product_price'];?></td>
        <td><?php echo $product['category_name'];?></td>
        <td>
          <div class="btn-group">
            <a href="<?php echo base_url('admin/product/'.$product['product_id']);?>" class="btn btn-primary "><i class="icon-edit"></i>Modify</a>
            <a href="<?php echo base_url('admin/product/delete/'.$product['product_id']);?>" class="btn btn-danger"><i class="icon-remove"></i>Delete</a>
          </div><!--btn-group-->
        </td>
      </tbody>
      <?php endforeach;?>
      </table><!--table table-hover-->  
    </div><!--span12-->
  </div><!--row-->
</div><!--container-->
