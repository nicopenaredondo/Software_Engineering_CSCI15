<div class="container">
	<div class="row">
		<div class="span12">

			<div class="row">
			<!--debug mode-->
			<a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Debug Mode</a>
		 	<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Debugger</h3>
			  </div>
			  <div class="modal-body" style="height:200px;">
			    <pre style="background-color:black;color:green;"><?php print_r($customer_information);?></pre>
			  </div>
			</div><!--modal hide fade-->
			<!--debug mode-->
			</div><!--row-->

			<div class="row" style="margin-top:10px;">
				<div class="span6" >
					<h3>Profile Information</h3>
					<hr>
					 <form class="">
					 		<!--first-name-->
				      <div class="control-group">
				        <label class="control-label">First Name</label>
				        <div class="controls">
				          <input id="full-name" name="first_name" type="text" placeholder="First Name"
				    	    class="span6">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <!--last-name-->
				      <div class="control-group">
				        <label class="control-label">Last Name</label>
				        <div class="controls">
				          <input id="full-name" name="last_name" type="text" placeholder="Last Name"
				    	    class="span6">
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				       <!--address#1-->
				      <div class="control-group">
				        <label class="control-label">Address</label>
				        <div class="controls">
				          <textarea id="full-name" class="span6" name="address_1" placeholder="Address # 1"></textarea>
				          <p class="help-block"></p>
				        </div><!--control-label-->
				      </div><!--control-group-->

				      <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="button" class="btn">Cancel</button>
							</div>
					</form>
				</div><!--span6-->
				<div class="span6">
					<h3>Account Information</h3>
					<hr>
				</div><!--span6-->
			</div><!--row-->


		</div><!--span12-->
	</div><!--row-->
</div><!--containen-->