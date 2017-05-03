<?php include __DIR__ . '/_header.php' ?>
	<div class="container">
	  	<div class="row">
	  		<div class="jumbotron">
	  			<form method="post" class="form-horizontal">
					<fieldset>

					<!-- Form Name -->
					<legend>Login</legend>

					<?php $msg->display() ?>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="account_no">Account Number</label>  
					  <div class="col-md-4">
					  <input id="account_no" name="account_no" placeholder="Account Number" class="form-control input-md" required="" type="text">
					  <span class="help-block">Enter your account number</span>  
					  </div>
					</div>

					<!-- Password input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="pin">Pin</label>
					  <div class="col-md-4">
					    <input id="pin" name="pin" placeholder="Pin" class="form-control input-md" required="" type="password">
					    <span class="help-block">Enter your pin</span>
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="login"></label>
					  <div class="col-md-4">
					    <button id="login" name="login" class="btn btn-primary">Login</button>
					  </div>
					</div>

					</fieldset>
				</form>
	  		</div>
	  	</div>
	</div>
<?php include __DIR__ . '/_footer.php' ?>