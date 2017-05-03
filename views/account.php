<?php include __DIR__ . '/_header.php' ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
					<div class="pull-right">
						<a href="/logout">Logout</a>
			      	</div>

			      	<h3>Welcome <?= ucfirst($account_info['name']) ?> | Account Balance: KES <?= $transaction_info ?></h3> 

			      	<hr>
			        <div class="row">
			        	<div class="col-md-6">
			        		<a href="/withdraw" class="btn btn-default btn-lg btn-block">Withdraw Cash</a>
			        	</div>
			        	<div class="col-md-6">
			        		<a href="/deposit" class="btn btn-default btn-lg btn-block">Deposit Cash</a>
			        	</div>
			        </div>
			        <br>
			        <div class="row">
			        	<div class="col-md-6">
			        		<a href="/transactions" class="btn btn-default btn-lg btn-block">Account Transactions</a>
			        	</div>
			        	<div class="col-md-6">
			        		<a href="/transfer" class="btn btn-default btn-lg btn-block">Transfer Cash</a>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
<?php include __DIR__ . '/_footer.php' ?>