<div class="container">
	<div class="row">
		<div class="col-md-3">	
			<div class="well">
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
				<div class="btn-group btn-group-sm btn-group-justified btn-block">
					<a type="button" class="btn btn-primary">DOCX</a>
					<a type="button" class="btn btn-default">Invoice</a>
					<a type="button" class="btn btn-warning">PDF</a>
				</div>
				<div class="btn-group btn-group-sm btn-group-justified btn-block">
					<a type="button" class="btn btn-primary">DOCX</a>
					<a type="button" class="btn btn-default">Packing</a>
					<a type="button" class="btn btn-warning">PDF</a>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<?php echo $this->element('Details/details_table', compact('order'));?>
		</div>
	</div>
</div>