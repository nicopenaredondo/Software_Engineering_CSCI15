<div class="container">
	<div class="row">
	<div class="span3">
		<h5>Categories</h5>
		<hr style="margin-top:0px;">
		<ul class="nav nav-list">
		<?php foreach($category_list as $category):?>
			<?php if($category['category_slug'] == $this->uri->segment(2)):?>
				<li class="active">
				<a href="<?php echo base_url('category/'.$category['category_slug']);?>"><?php echo ucwords($category['category_name']);?></a>
				</li>
			<?php else:?>
				<li>
					<a href="<?php echo base_url('category/'.$category['category_slug']);?>"><?php echo ucwords($category['category_name']);?></a>
				</li>
			<?php endif;?>
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
		  <li><a href="<?php echo base_url('category/'.$this->uri->segment(2));?>"><?php echo ucwords($this->uri->segment(2));?></a><span class="divider">/</span></li>
		  <li><a href="<?php echo base_url('category/'.$product_info['product_slug']);?>"><?php echo ucwords($product_info['product_name']);?></a></li>
		</ul><!-- breadcrumb -->
		<hr style="margin-top:-16px;">
		<div class="span4" style="text-align:center;">
			<img src="<?php echo base_url('assets/images/no_picture.png');?>" alt="">
		</div><!-- span4 -->
		<div class="span4">
			<h2><?php echo ucwords($product_info['product_name']);?></h2>
			<hr>
			<p>
			<h4>Price : <b>P<?php echo $product_info['product_price'];?></b></h4>
			<form method="POST" action="<?php echo base_url('cart/add-to-cart/'.$product_info['product_slug']);?>">
			<div class="input-append">
				<input  name="current_url" type="hidden" value="<?php echo $this->uri->uri_string();?>">
				<input  name="product_quantity" class="span1" id="appendedInputButton" value="1" type="number" pattern="[0-9]"  min="1">
			  	<button class="btn" type="submit"><i class="icon-shopping-cart"></i>Add to Cart</button>
			</div>
			<?php echo $this->session->flashdata('message');?>
			</p>
			</form>
		<div class="social_media">
			<span class='st_facebook_hcount' displayText='Facebook'></span>
			<span class='st_twitter_hcount' displayText='Tweet'></span>
			<span class='st_tumblr_hcount' displayText='Tumblr'></span>
		</div><!-- social media -->
			
		</div><!-- span4 -->
		<div class="span8">
			<div class="tabbable"> <!-- Only required for left/right tabs -->
			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
			    <li><a href="#tab2" data-toggle="tab">Comments</a></li>
			  </ul>
			  <div class="tab-content">
			    <div class="tab-pane active" id="tab1">
			      	<p class="lead"><?php echo ucwords($product_info['product_name']);?></p>
			    	<p style="text-align:justify"><?php echo $product_info['product_description'];?></p>
			    </div>
			    <div class="tab-pane" id="tab2">
			          <div id="disqus_thread"></div>
				    <script type="text/javascript">
				        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				        var disqus_shortname = 'infinity0808'; // required: replace example with your forum shortname

				        /* * * DON'T EDIT BELOW THIS LINE * * */
				        (function() {
				            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				        })();
				    </script>
				    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
			    </div>
			  </div>
			</div><!-- tabbable -->
		</div><!-- span8 -->
	</div>
	</div><!-- row -->
</div><!-- container -->