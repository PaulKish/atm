<?php include __DIR__ . '/_header.php' ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<form method="post" class="form-horizontal">
					<fieldset>
						<!-- Form Name -->
						<legend>Transfer Cash</legend>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="Amount">Amount</label>  
						  <div class="col-md-4">
						  <input id="Amount" name="amount" placeholder="Amount" class="form-control input-md" required="" type="text">
						  <span class="help-block">Enter the amount</span>  
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="Amount">Transfer To</label>  
						  <div class="col-md-4">
						  <select name="account" class="form-control">
						  	<option>--Please select--</option>
						  	<?php foreach($accounts as $account): ?>
							  	<option value="<?=$account['account_no']?>"><?=$account['name'].' - '.$account['account_no']?></option>
							<?php endforeach; ?>
						  </select>
						  <span class="help-block">Select the account to transfer to</span>  
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="Transfer"></label>
						  <div class="col-md-4">
						    <button id="Transfer" name="transfer" type="submit" class="btn btn-primary">Transfer</button>
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