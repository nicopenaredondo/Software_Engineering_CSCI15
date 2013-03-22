
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
<body>
  <div class="container">
  
    <div class="row">
        <div class="span5 pull-right" style="margin-top:5px;">
        <?php if($this->session->userdata('logged_in') === FALSE):?>
          <p style="text-align:right;">
            <a href="<?php echo base_url('auth');?>">Sign In</a> or  <a href="<?php echo base_url('auth/register');?>">Register</a>
            <br><a class="btn" href="<?php echo base_url('admin');?>">Admin Page</a>
          </p>
        <?php else:?>
           <p style="text-align:right;">
            Hi <a href="<?php echo base_url('my_account');?>"><?php echo $this->session->userdata('username');?></a>
            <a href="#" class="btn btn-small btn-info"><i class="icon-shopping-cart"></i>Cart</a>
           </p>
        <?php endif;?>
        </div><!--span5 pull-right-->
    </div><!--row-->

    <div class="row">
      <div class="span4">
        <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt=""/>
      </div><!--span4-->
      <div class="span8">
            <div class="navbar navbar-googlebar" style="margin-top:28px;">
              <div class="navbar-inner">
               <form class="navbar-form pull-left">
                  <div class="input-append">
                    <input class="span7" id="appendedInputButtons" placeholder="Search Product" type="text">
                    <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
                  </div>
                </form><!--navbar-form pull-left-->
              </div><!--navbar-inner-->
            </div><!--navbar-->
      </div><!--span7-->
    </div><!--row-->

    <div class="row">
      <div class="span12">
      <div class="navbar navbar-googlenav">
        <div class="navbar-inner">
          <ul class="nav">
            <li class="active"><a href="<?php echo base_url('admin');?>">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div><!--navbar-inner-->
      </div><!--navbar-->
    </div><!--span12-->
    </div><!--row-->
  
    <div class="row">
      <div class="span7">
        <img style="height:286px;" src="<?php echo base_url('assets/images/stock/big-image.jpg');?>"/>
      </div><!--span7-->
      <div class="span5">
          <img style="width:380px;height:138px;"src="<?php echo base_url('assets/images/stock/add1.png');?>"/>
          <img  style="width:3800px;height:138px; margin-top:10px"src="<?php echo base_url('assets/images/stock/add2.png');?>"/>
      </div>
    </div><!--row-->
      
    <div class="row" style="margin-top:20px;">
      <div class="span4">
        <img src="<?php echo base_url('assets/images/stock/pic1.jpg');?>" alt="">
      </div><!--span4-->

      <div class="span4">
        <img src="<?php echo base_url('assets/images/stock/pic2.jpg');?>" alt="">
      </div><!--span4-->

      <div class="span4">
        <img src="<?php echo base_url('assets/images/stock/pic3.jpg');?>" alt="">
      </div><!--span4-->
    </div><!--row-->
     <div class="page-header">
      Copyright | 2013
     </div>
  </div><!--container-->

</body>
</html>
