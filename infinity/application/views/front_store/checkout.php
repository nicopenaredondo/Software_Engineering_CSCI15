<?php if($this->cart->total_items() > 0):?>
<div class="container">
  
  
	<div class="row">
		<div class="span12">
			<?php echo $this->session->flashdata('message');?>
		</div><!-- span12 -->
	</div><!-- row -->
	<div class="row">
		<div class="span12 fuelux">
			<div class="widget-box">
        <div class="widget-title" style="height:36px;">
          <span class="icon"><i class="icon-shopping-cart"></i></span>
          <h5>Items in your cart [<b style="color:red;"><?php echo $this->cart->total_items();?></b>]</h5>
        </div><!--widget-title-->
        <div class="widget-content">
          <?php if($this->cart->total_items() >= 1):?>
            <form method="POST" action="<?php echo base_url('cart/modify-cart');?>">
            <table class="table">
              <thead>
                <th>Product Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </thead>
              <?php foreach($this->cart->contents() as $items):?>
                <tbody>
                  <td><?php echo $items['id'];?></td>
                  <td><?php echo $items['name'];?></td>
                  <td>
                    <div class="input-append">
                      <form>
                      <input  name="rowid" type="hidden" value="<?php echo $items['rowid'];?>">
                      <input  name="product_quantity"value="<?php echo $items['qty'];?>" class="span1" id="appendedInputButtons" type="text">
                      <button class="btn btn-primary" type="submit"><i class="icon-refresh"></i></button>
                      <a class="btn btn-danger"href="<?php echo base_url('cart/delete-product/'.$items['rowid']);?>"><i class="icon-trash"></i></a>
                      </form>
                    </div>
                  </td>
                  <td>₱<?php echo $items['price'];?></td>
                  <td>₱<?php echo $items['price'] * $items['qty'];?></td>
                </tbody>
              <?php endforeach;?>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total Price</td>
                  <td ><b>₱<?php echo $this->cart->total();?></b></td>
                </tbody>
            </table>
            </form>
            <?php else:?>
            <div class="alert alert-info">
              <i class="icon-shopping-cart"></i>Your cart is currently empty.Start <a href="<?php echo base_url('category');?>"><b>shopping</b></a> now
            </div>
            <?php endif;?>
        </div><!-- widgetcontent -->
      </div><!-- widgetbox -->
		</div><!-- span12 -->
	</div><!-- row -->
  <form method="POST" action="<?php echo base_url('cart/checkout/process');?>" class="form-horizontal">
  <div class="row">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title" style="height:36px;">
          <span class="icon"><i class="icon-address-book"></i></span>
          <h5>Billing Information</h5>
        </div><!--widget-title-->
        <div class="widget-content">
          <?php echo form_error('first_name');?>
          <div class="control-group">
            <label class="control-label" for="inputFirstName">
             <i class="icon-asterisk" style="padding-right:4px;"></i> First Name
            </label>
            <div class="controls">
              <input name="first_name" type="text" id="inputFirstName" placeholder="First Name" value="<?php echo $customer_information['first_name'];?>">
            </div><!-- controls -->
          </div><!--control-group-->

          <?php echo form_error('last_name');?>
          <div class="control-group">
            <label class="control-label" for="inputLastName">
              <i class="icon-asterisk" style="padding-right:4px;"></i>Last Name
            </label>
            <div class="controls">
              <input name="last_name" type="text" id="inputLastName" placeholder="Last Name" value = "<?php echo $customer_information['last_name'];?>">
            </div><!-- controls -->
          </div><!--control-group-->

          <?php echo form_error('address');?>
          <div class="control-group">
            <label class="control-label">
             <i class="icon-asterisk" style="padding-right:4px;"></i> Address
            </label>
            <div class="controls">
              <textarea style="resize:none;"rows="5"class="span8" name="address" placeholder="Address # 1"><?php echo $customer_information['address'];?></textarea>
              <p class="help-block"></p>
            </div><!--control-label-->
          </div><!--control-group-->

          <?php echo form_error('mobile');?>
          <div class="control-group">
            <label class="control-label" for="inputMobile">
             <i class="icon-asterisk" style="padding-right:4px;"></i>Mobile #
            </label>
            <div class="controls">
              <input name="mobile" type="text" id="inputMobile" placeholder="Mobile #" value = "<?php echo $customer_information['mobile'];?>">
            </div><!-- controls -->
          </div><!--control-group-->
          
          <?php echo form_error('city');?>
          <div class="control-group">
            <label class="control-label" for="inputCity">
              <i class="icon-asterisk" style="padding-right:4px;"></i>City
            </label>
            <div class="controls">
              <input name="city" type="text" id="inputCity" placeholder="City" value="<?php echo $customer_information['city'];?>">
            </div><!-- controls -->
          </div><!--control-group-->

          <?php echo form_error('zip_code');?>
          <div class="control-group">
            <label class="control-label">
              <i class="icon-asterisk" style="padding-right:4px;"></i>Zip Code
            </label>
            <div class="controls">
              <input name="zip_code" type="text" placeholder="Zip Code" class="span4" value="<?php echo $customer_information['zip_code'];?>">
              <p class="help-block"></p>
            </div><!--control-label-->
          </div><!--control-group-->

          <!--country-->
          <?php echo form_error('country');?>
          <div class="control-group">
            <label class="control-label"><i class="icon-asterisk"></i>
              Country
            </label>
            <div class="controls">
              <input name="country" type="text" placeholder="Country" class="span4" value="<?php echo $customer_information['country'];?>">
              <p class="help-block"></p>
            </div><!--control-label-->
          </div><!--control-group-->
          
        </div><!-- widget-content -->
      </div><!-- widget-box -->
    </div><!-- span6 -->
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title" style="height:36px;">
          <span class="icon"><i class="icon-lock"></i></span>
          <h5>Payment Method</h5>
        </div><!--widget-title-->
        <div class="widget-content">
          <label class="radio">
            <?php echo form_error('payment_method');?>
            <input type="radio" value="1" name="payment_method" checked>
            Meetup
          </label>
          <div class="alert alert-red">
            <p><b>Terms and Condition</b><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </div><!-- alert -->
          <div class="alert alert-info">
            <p><b>Available Meetups</b>
              <ol>
                <li>Trinoma</li>
                <li>Waltermart (Munoz)</li>
                <li>SM North Edsa</li>
                <li>SM Marilao</li>
                <li>SM Valenzuela</li>
              </ol>
            </p>
          </div><!-- alert -->
          <?php echo form_error('message');?>
          <div class="control-group">
            <label class="control-label">
            Message
            </label>
            <div class="controls">
              <textarea style="resize:none;"rows="5"class="span8" name="message" placeholder="Message"></textarea>
              <p class="help-block"></p>
            </div><!--control-label-->
          </div><!--control-group-->
        </div><!-- widget-content -->
      </div><!-- widget-box -->
    </div><!-- span6 -->
  </div><!-- row -->
  <div class="row">
    <div class="span12">
      <div class="form-actions">
        <button type="submit" class="btn btn-primary pull-right"><i class="icon-check"></i>Submit</button>
      </div>
    </div><!-- span12 -->
  </div><!-- row -->
  </form><!-- form- -->
</div><!-- container -->
<?php else:?>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="alert alert-info">
        <i class="icon-shopping-cart"></i>
        You don't have any items in your shopping cart. <u><b><a href="<?php echo base_url('category');?>">Shop</a></b></u> now
      </div><!-- alert alert-info -->
    </div><!-- span12 -->
  </div><!-- row -->
</div><!-- div -->
<?php endif;?>