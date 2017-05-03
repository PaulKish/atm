<?php include __DIR__ . '/_header.php' ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h3>Account Transactions</h3>
				<hr>
				<table class="table table-bordered table-condensed table-striped">
					<thead>
						<th>Amount</th>
						<th>Transaction Type</th>
						<th>Date</th>
					</thead>
					<tbody>
						<?php foreach($transactions as $transaction): ?>
							<tr>
								<td>KES <?= $transaction['amount']; ?></td>
								<td><?= $transaction['transaction_type'] == 1 ? 'Withdraw':'Deposit'; ?></td>
								<td><?= $transaction['date']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<a class="btn btn-default" href="/account">Cancel</a>
			</div>
		</div>
	</div>
</div>
<?php include __DIR__ . '/_footer.php' ?>