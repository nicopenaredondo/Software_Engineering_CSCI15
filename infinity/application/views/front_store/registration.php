<div class="content">
  <div class="container">
    <div class="row">
      <div class="span6">
        <h3 class="title">Register Today <span class="color">!!!</span></h3>
        <h4>Morbi tincidunt posuere turpis eu laoreet</h4>
        <p>Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>
        <h5>Maecenas hendrerit neque id</h5>
        <ul>
          <li>Etiam adipiscing posuere justo, nec iaculis justo dictum non</li>
          <li>Cras tincidunt mi non arcu hendrerit eleifend</li>
          <li>Aenean ullamcorper justo tincidunt justo aliquet et lobortis diam faucibus</li>
          <li>Maecenas hendrerit neque id ante dictum mattis</li>
          <li>Vivamus non neque lacus, et cursus tortor</li>
        </ul>
        <p>Nullam in est urna. In vitae adipiscing enim. In ut nulla est. Nullam in est urna. In vitae adipiscing enim. Curabitur rhoncus condimentum lorem, non convallis dolor faucibus eget. In ut nulla est. </p>
      </div><!--span6-->
      <div class="span6">
        <div class="formy well">
          <h4 class="title">Registration</h4>
          <div class="form">
            <!-- Register form (not working)-->
              <form class = "form-horizontal" action="<?php echo base_url('auth/register/new');?>" method = "POST">      
                <?php echo $this->session->flashdata('message');?>
                
                <?php echo form_error('first_name');?>                                
                <!-- Username -->
                <div class="control-group">
                  <label class="control-label" for="first_name">First Name</label>
                  <div class="controls">
                    <input type="text" name="first_name" placeholder="First Name" value="" required>
                  </div>
                </div>

                <?php echo form_error('last_name');?>                                
                <!-- Username -->
                <div class="control-group">
                  <label class="control-label" for="last_name">Last Name</label>
                  <div class="controls">
                    <input type="text" name="last_name" placeholder="Last Name" value="" required>
                  </div>
                </div>
                <?php echo form_error('email_address');?>                                
                <!-- Username -->
                <div class="control-group">
                  <label class="control-label" for="email_address">E-Mail</label>
                  <div class="controls">
                    <input type="text" name="email_address" placeholder="Email Address" value="" required>
                  </div>
                </div>

                <?php echo form_error('username');?>                                
                <!-- Username -->
                <div class="control-group">
                  <label class="control-label" for="username">Username</label>
                  <div class="controls">
                    <input type="text" name="username" placeholder="username" value="" required>
                  </div>
                </div>
                <!-- Password -->
                <?php echo form_error('password');?>
                <div class="control-group">
                  <label class="control-label" for="email">Password</label>
                  <div class="controls">
                    <input type="password" name="password" placeholder="password" required>
                  </div>
                </div>
               <!-- Buttons -->
                <div class="form-actions">
                 <!-- Buttons -->
                  <button type="submit" class="btn">Register</button>
                  
                </div>
              </form>
                <hr>
                
                Already have an Account ?  <a href="<?php echo base_url('auth');?>">Login</a>
          </div><!--divform--> 
        </div><!--well-->
      </div><!--span6-->
    </div><!--row-->
  </div><!--container-->
</div><!--content-->