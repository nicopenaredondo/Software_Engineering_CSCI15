<div class="container">
	<div class="row">
	<div class="span3">
		<h5>Categories</h5>
		<hr style="margin-top:0px;">
		<ul class="nav nav-list">
		<?php foreach($category_list as $category):?>
			<li>
				<a href="<?php echo base_url('category/'.$category['category_slug']);?>"><?php echo ucwords($category['category_name']);?></a>
			</li>
		<?php endforeach;?>
		</ul>
		<h5>Latest Items</h5>
		<hr style="margin-top:0px;">
		<?php if(!empty($list_products)):?>
		<div id="latest_items_category_view">
      <?php foreach($list_products as $products):?>
      
        <div class="item" style="height:350px;">
          <!-- Item image -->
          <div class="item-image">
            <a href="single-item.html"><img src="<?php echo base_url('assets/images/no_picture.png');?>" alt=""></a>
          </div><!-- item-image -->
          <!-- Item details -->
          <div class="item-details">
            <!-- Name -->
            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
            <h5><a href="single-item.html"><?php echo ucwords($products['product_name']);?></a></h5>
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
      <?php endforeach;?>
      </div><!-- recent items slide -->
    	<?php else:?>
    	<p style="text-align:center">No products found in the database</p>
    <?php endif;?>
	</div><!-- span 3 -->
	<div class="span9">
		<ul class="breadcrumb" style="background:transparent;">
		  <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
		  <li><a href="<?php echo base_url('category');?>">Category</a></li>
		</ul><!-- breadcrumb -->
		<hr style="margin-top:-16px;">
		<h4>List of Products</h4>
	</div>
	</div><!-- row -->

</div><!-- container -->