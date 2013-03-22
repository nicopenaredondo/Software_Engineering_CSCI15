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
	  .signin-box input[type=submit] {
	    margin: 0 20px 15px 0;
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
        	<?php echo form_open($this->uri->uri_string()); ?>
            <fieldset>
            <div class="alert alert-error"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
              <label for="username"><?php echo form_label($login_label, $login['id']); ?></label>
              	<?php echo form_input($login); ?>

		<div class="alert alert-error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
              <label for="passwd"><?php echo form_label('Password', $password['id']); ?></label>
              	<?php echo form_password($password); ?>

              <!--<input type="submit" class="btn btn-primary" value="Sign in">-->
              <?php $attributes = array('class' => 'btn btn-primary');
              <?php echo form_submit('submit', 'Let me in',$attributes); ?>
             </fieldset>
          </form>
		</div><!--signin-box-->
      </div><!--signin-->
