<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Checkout Options</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
	  <div class="row">
		<div class="col-sm-6">
		<form action="ordersuccess.php" method="GET">
		<?php
		if(!isset($_SESSION['username'])){
								echo '
			<h2>New Customer</h2>
			Checkout Options : <br/>
			<input type="radio" name="acctype" value="guestacc" checked> Guest Checkout<br>	
			By creating an account you will be able to shop faster, be up to date on an order\'s status, and keep track of the orders you have previously made.<br/>
			';
			
		}
		?>
		<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="btn btn-info">Continue</a>
		</div>
		<div class="col-sm-6">
							<?php
							if(!isset($_SESSION['username'])){
								echo '
							<p><input type="text" class="form-control" name="uemail" id="uemail" placeholder="Enter Email" /><br/>
			<input type="password" class="form-control" name="upass" id="upass" placeholder="Enter Password" /><br/>
			<button class="btn btn-primary" onclick="check();">Login</button>
			<a href="register.php" class="btn btn-primary">Register</a>
			<a href="forgot.php" class="btn btn-primary">Forgot Password</a>
			<div id="successshow"></div>
			</p>';
							}else{
								echo "Hello ".$_SESSION['username'];
							}
							
							?>

		</div>
	  </div>
	  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Billing Details</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
	<div class="row">
  <div class="col-sm-6">
    <fieldset id="account">
      <legend>Your Personal Details</legend>
      <div class="form-group required">
        <label class="control-label" for="input-payment-firstname">First Name</label>
        <input type="text" name="firstname" value="" placeholder="First Name" id="input-payment-firstname" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-lastname">Last Name</label>
        <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-email">E-Mail</label>
        <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-telephone">Telephone</label>
        <input type="text" name="telephone" value="" placeholder="Telephone" id="input-payment-telephone" class="form-control">
      </div>
      <div class="form-group">
        <label class="control-label" for="input-payment-fax">Fax</label>
        <input type="text" name="fax" value="" placeholder="Fax" id="input-payment-fax" class="form-control">
      </div>
          </fieldset>
  </div>
  <div class="col-sm-6">
    <fieldset id="address" class="required">
      <legend>Your Address</legend>
      <div class="form-group">
        <label class="control-label" for="input-payment-company">Company</label>
        <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-address-1">Address 1</label>
        <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
      </div>
      <div class="form-group">
        <label class="control-label" for="input-payment-address-2">Address 2</label>
        <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-city">City</label>
        <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-postcode">Post Code</label>
        <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-country">Country</label>
        <input type="text" class="form-control" name="country_id" />
      </div>
      <div class="form-group required">
        <label class="control-label" for="input-payment-zone">Region / State</label>
			<input type="text" class="form-control" name="state" />
		</div>
          </fieldset>
    
		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="btn btn-info">Continue</a>
		
      </div>
</div>
	  </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Payment Methods</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
		 <p>Please select the preferred payment method to use on this order.</p><br/>
		<div class="radio">
		  <label>
					<input type="radio" name="payment_method" value="cod" checked="checked">
				Cash On Delivery      </label>
		</div>
		<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="btn btn-info">Continue</a>
		
	  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Confirm Order</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
	 <?php include('lastcart.php'); ?>
</form>
	  </div>
    </div>
  </div>
</div>