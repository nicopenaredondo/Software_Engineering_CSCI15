
<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
 <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>| Infinity Webshop |</title>

  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/todc-bootstrap.css');?>">

</head>
<body style="background-image: url('<?php echo base_url("assets/background/maze_white.png");?>');">
  <div class="container">
    
 <div class="row">
        <div class="span5 pull-right" style="margin-top:5px;">
        <?php if($this->session->userdata('logged_in') === FALSE):?>
          <p style="text-align:right;">
            <a href="<?php echo base_url('auth');?>">Sign In</a> or  <a href="<?php echo base_url('auth/register');?>">Register</a>
          </p>
        <?php else:?>
           <p style="text-align:right;">
            Hi <a href="<?php echo base_url('my_account');?>"><?php echo $this->session->userdata('username');?></a>
            <a href="#" class="btn btn-small btn-info"><i class="icon-shopping-cart"></i>Cart</a>
           </p>
        <?php endif;?>
        </div><!--span5 pull-right-->
    </div><!--row-->
  </div><!--container--> 
</body>
</html>
