<table class="table table-striped">
	<thead>
        <tr>
			<th>&nbsp;</th>
			<th>BBP Catalog #</th>
			<th>Alfa Catalog #</th>
			<th>Product Description</th>
			<th>Lot</th>
			<th>Qty</th>
			<th>Price</th>
			<th>Line Total</th>
        </tr>
	</thead>
	<?php foreach($order['Detail'] as $detail) { ?>
	<tr>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</td>
		<td><?php echo $detail['Product']['bbp_cat']; ?></td>
		<td><?php echo $detail['Product']['aa_cat']; ?></td>
		<td><?php echo $detail['Product']['description']; ?></td>
		<td><?php echo $detail['lot']; ?></td>
		<td><?php echo $detail['quantity']; ?></td>
		<td><?php echo '$'.money_format('%i', $detail['Product']['price']); ?></td>
		<td><?php echo '$'.money_format('%i', $detail['Product']['price']*$detail['quantity']); ?></td>
	</tr>
	<?php } ?>
</table>