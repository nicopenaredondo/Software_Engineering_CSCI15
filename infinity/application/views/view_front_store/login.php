	<style type="text/css">
	  body { background-image : url('<?php echo base_url("assets/images/bg2.png");?>'); padding-top: 40px; padding-bottom: 40px; }
	  a { color: #15c; text-decoration: none; }
	  a:hover { color: #15c; text-decoration: underline; }
	  form,
	  label,
	  input[type=text],
	  input[type=checkbox],
	  input[type=password] {
	  margin: 0;
	      }

	  .signin {
	    width: 335px;
	    margin: 0 auto;
	    }
	  
	  .signin-box {
	    padding: 20px 25px 15px;
	    background: #f1f1f1;
	    border: 1px solid #e5e5e5;
	    }
	  
	  .signin-box h2 {
	    font-size: 16px;
	    font-weight: normal;
	    line-height: 17px;
	    height: 16px;
	    margin: 0 0 19px;
	    }

	  .signin-box input[type=checkbox] {
	    vertical-align: bottom;
	    }
	  
	  .signin-box input[type=text],
	  .signin-box input[type=password] {
	    width: 100%;
	    font-size: 15px;
	    color: black;
	    line-height: normal;
	    height: 32px;
	    margin: 0 0 20px;
	        box-sizing: border-box;
	    }
	 

	  .signin-box label {
	    color: #222;
	    margin: 0 0 5px;
	    display: block;
	    font-weight: bold;
	    font-size: 13px;
	    }

	  .signin-box label.remember {
	    display: inline-block;
	    vertical-align: top;
	    margin: 9px 0 0;
	    line-height: 1;
	    font-size: 13px;
	    }

	  .signin-box .remember-label {
	    font-weight: normal;
	    color: #666;
	    line-height: 0;
	    padding: 0 0 0 5px;
	    }

	  .signin-box ul {
	    list-style: none;
	    line-height: 17px;
	    margin: 0;
	    padding: 0;
	    }
  </style>
<body>
	<div class="container">
    <div class="signin">
      <div class="signin-box">
        <h2 class="form-signin-heading">Sign in</h2>
        	<form action="<?php echo base_url('auth/login');?>" method = "POST">
            <fieldset>
           <?php echo $this->session->flashdata('message');?>
           <?php echo form_error('username');?>
              <label for="username">Username</label>
              	<input type="text" name="username" placeholder="username" value="<?php echo set_value('username');?>">

		 <?php echo form_error('password');?>
              <label for="passwd">Password</label>
              	<input type="text" name="password" placeholder="password">

              <input type="submit" class="btn btn-primary" value="Sign in">
             <a class="pull-right"href="<?php echo base_url('auth/register');?>">Not a member yet ?</a>
             </fieldset>
          </form>
		</div><!--signin-box-->
      </div><!--signin-->
