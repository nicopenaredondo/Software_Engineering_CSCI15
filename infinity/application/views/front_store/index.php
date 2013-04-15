  <!-- Modal -->
          <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Debugger</h3>
            </div>
            <div class="modal-body" style="height:200px;">
              <pre style="background-color:black;color:green;"><?php print_r($list_products);?></pre>
            </div>
          </div><!--modal hide fade-->
          <!--debug mode-->
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <img src="<?php echo base_url('assets/images/slider1.jpg');?>" />
            <p class="flex-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </li>
          <li>
            <img src="<?php echo base_url('assets/images/slider2.jpg');?>" />
            <p class="flex-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </li>
          <li>
            <img src="<?php echo base_url('assets/images/slider3.jpg');?>" />
            <p class="flex-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </li>
          <li>
            <img src="<?php echo base_url('assets/images/slider4.jpg');?>" />
            <p class="flex-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </li>
        </ul>
      </div>
    </div><!--span12-->
  </div><!--row-->


</div><!--container-->


<div class="items">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h3 class="title">Latest Items</h3>
      </div>
      <!-- Item  -->
      <div id="recent_items_slide">
      <?php if(!empty($list_products)):?>
      <?php foreach($list_products as $products):?>
      <div class="span3">
        <div class="item" style="height:350px;">
          <!-- Item image -->
          <div class="item-image">
            <a href="<?php echo base_url('category/'.$products['category_name'].'/'.$products['product_slug']);?>"><img src="<?php echo base_url('assets/img/'.$products['product_image_name']);?>" alt=""></a>
          </div><!-- item-image -->
          <!-- Item details -->
          <div class="item-details">
            <!-- Name -->
            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
            <h5><a href="<?php echo base_url('category/'.$products['category_name'].'/'.$products['product_slug']);?>"><?php echo ucwords($products['product_name']);?></a></h5>
            <div class="clearfix"></div>
            <!-- Para. Note more than 2 lines. -->
            <p style="text-align:center;">
              <span class="label label-info">P<?php echo $products['product_price'];?></span><br>
              <?php echo character_limiter($products['product_description'],20);?>
            </p>
            <hr>
            <!-- Add to cart -->
            <div class="button" style="text-align:center;"><a href="<?php echo base_url('category/'.$products['category_name'].'/'.$products['product_slug']);?>" class="btn btn-danger btn-small"><i class="icon-search"></i>View Item</a></div>
            <div class="clearfix"></div>
          </div><!-- item-details -->
        </div><!-- item -->
      </div><!-- span3 -->
      <?php endforeach;?>
      </div><!-- recent items slide -->
      <?php else:?>
      <div class="span12" style="text-align:center;">
        <p>No products inside the database</p>
      </div><!-- span12 -->
      <?php endif;?>
     
     

    </div><!--span12-->
  </div><!--container-->
</div><!--items-->





