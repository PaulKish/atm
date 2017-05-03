<?php include __DIR__ . '/_header.php' ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<form method="post" class="form-horizontal">
					<fieldset>
						<!-- Form Name -->
						<legend>Deposit Cash</legend>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="Amount">Amount</label>  
						  <div class="col-md-4">
						  <input id="Amount" name="amount" placeholder="Amount" class="form-control input-md" required="" type="text">
						  <span class="help-block">Enter the amount</span>  
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="deposit"></label>
						  <div class="col-md-4">
						    <button id="deposit" name="deposit" type="submit" class="btn btn-primary">Deposit</button>
						    <a href="/account" class="btn btn-default">Cancel</a>
						  </div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include __DIR__ . '/_footer.php' ?>