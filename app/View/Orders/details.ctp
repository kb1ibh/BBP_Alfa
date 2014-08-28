<div class="container">
	<div class="row">
		<div class="col-md-3">	
			<table class="table-bordered table">
				<tr>
					<td width="50%"><strong>PO #</strong></td>
					<td><?php echo $order['Order']['po_number']?></td>
				</tr>
				<tr>
					<td><strong>Invoice #</strong></td>
					<td><?php echo $order['Order']['invoice_number']?></td>
				</tr>
				<tr>
					<td><strong>Created</strong></td>
					<td>
						<?php
						$time = strtotime($order['Order']['created']);
						echo date("m/d/Y H:ia", $time);
						?>
					</td>
				</tr>
			</table>
			<div class="well">
				<button type="button" class="btn btn-primary btn-block">New Order</button>
			</div>
		</div>
		<div class="col-md-9">
			<?php echo $this->element('Details/details_table', compact('order'));?>
		</div>
	</div>
</div>