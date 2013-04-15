<!doctype html>
<html>
<head>
	<title>Administrator Access</title>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/todc-bootstrap.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/wysiwyg/lib/css/wysiwyg-color.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/wysiwyg/lib/css/bootstrap-wysihtml5.css');?>">
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="navbar navbar-googlenav">
  	<div class="navbar-inner">
   	  <a class="brand" href="<?php echo base_url('admin');?>">Administrator</a>
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('admin');?>"> Home</a>
          </li>
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('admin/order');?>">Orders</a></li>
              <li><a href="<?php echo base_url('admin/customer');?>">Customers</a></li>
            </ul>
          </li><!--dropdown-->
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalog<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('admin/category');?>">Categories</a></li>
              <li><a href="<?php echo base_url('admin/product');?>">Products</a></li>
            </ul>
          </li><!--dropdown-->

          <li>
           <a href="<?php echo base_url('admin/blog');?>">Content</a>
          </li><!--dropdown-->           
        </ul><!--nav-->
        <div class="btn-group pull-right">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="icon-user"></i>User<span class="caret"></span>
        </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url('admin/logout');?>"><i class="icon-share"></i> Logout</a></li>
          </ul>
        </div>  
  	</div><!--navbar-inner-->
</div><!--navbar-->


