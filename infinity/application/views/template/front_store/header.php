<!doctype html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/todc-bootstrap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/style.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elusive-webfont.css');?>">
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/widget.js');?>"></script>
</head>
<body style="background-image: url('assets/background/square_bg.png');?>">
<header>
  <div class="container">
    <div class="row">
      <div class="span4">
        <h1>
          <a href="<?php echo base_url();?>">LOGO HERE</a>
        </h1>
        <p><small>shopping is fun!!</small></p>
      </div><!--span4-->
      <div class="span8">
        <?php if($this->session->userdata('logged_in') === FALSE):?>
        <form class="form-search pull-right" style="margin-top:10px;">
          <br>
          <div class="btn-group pull-right" style="margin-top:10px;">
            <a href="<?php echo base_url('auth');?>" class="btn btn-primary span1">Login</a>
            <a href="<?php echo base_url('auth/register');?>" class="btn btn-primary span1">Register</a>
            <a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Debug Mode</a>
          </div><!--btn-group-->
        </form>
        <?php else:?>
        <div class="btn-group pull-right" style="margin-top:25px;">
          <a class="btn" href="#">
            <i class="icon-globe"></i><span class="hidden-phone hidden-tablet"> Notifications</span> <span class="label label-important hidden-phone">2</span>
          </a>

          <a class="btn" href="" data-toggle="modal" data-target="#myCart">
            <i class="icon-shopping-cart"></i><span class="hidden-phone hidden-tablet"> Cart</span> <span class="label label-important hidden-phone"><?php echo $this->cart->total_items();?></span>
          </a>

          <!-- start: User Dropdown -->
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i><span class="hidden-phone hidden-tablet"> Yo' Mama</span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('dashboard');?>">Profile</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url('dashboard/logout');?>">Logout</a></li>
          </ul>
         <!-- end: User Dropdown -->
        </div><!-- btn group-ull-right -->
         <!-- Modal -->
          <div id="myCart" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Shopping Cart</h3>
            </div>
            <div class="modal-body">
            <?php if($this->cart->total_items() >= 1):?>
            <table class="table">
              <thead>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
              </thead>
              <?php foreach($this->cart->contents() as $items):?>
                <tbody>
                  <td><?php echo $items['name'];?></td>
                  <td><?php echo $items['qty'];?></td>
                  <td><?php echo $items['price'];?></td>
                </tbody>
              <?php endforeach;?>
                <tbody>
                  <td></td>
                  <td>Total Price</td>
                  <td ><b>₱<?php echo $this->cart->total();?></b></td>
                </tbody>
             </table>
            <?php else:?>
            <div class="alert alert-info">
              <i class="icon-shopping-cart"></i>Your cart is currently empty.Start <a href="<?php echo base_url();?>"><b>shopping</b></a> now
            </div>
            <?php endif;?>
            </div>
            <div class="modal-footer">
              <?php if($this->cart->total_items() >= 1):?>
                <a href="<?php echo base_url('cart/reset-cart');?>" class="btn btn-primary">Checkout</a>
              <?php else:?>
                <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
              <?php endif;?>
            </div>
          </div><!-- mycart -->
        <?php endif;?>
      </div><!--span8-->
    </div><!--row-->
  </div><!--container-->
</header>

<div class="navbar navbar-googlenav">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
        <li>
          <a href="index.html"><i class="icon-home"></i>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>">Home</a>
        </li>
        <?php foreach($category_list as $category):?>
        <li>
          <a href="<?php echo base_url('category/'.$category['category_slug']);?>"><?php echo ucwords($category['category_name']);?></a>
        </li>
        <?php endforeach;?>
      </ul><!--nav-->      
    </div><!--container-->
  </div><!--navbar-inner-->
</div><!--navbar navbar-googlenav-->

