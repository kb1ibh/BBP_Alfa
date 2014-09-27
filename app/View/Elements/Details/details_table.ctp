<?php $total = 0; ?>
<table class="table table-striped">
	<thead>
        <tr>
			<th class="nowrap">&nbsp;</th>
			<th class="nowrap">BBP Cat #</th>
			<th class="nowrap">Alfa Cat #</th>
			<th>Product Description</th>
			<th class="nowrap">Lot</th>
			<th class="nowrap">Qty</th>
			<th class="nowrap">Price</th>
			<th class="nowrap">Line Total</th>
        </tr>
	</thead>
	<?php foreach($order['Detail'] as $detail) { ?>
	<tr>
		<!-- fixed width maintains button group -->
		<td class="nowrap" width="65px">
			<div class="btn-group">
				<button type="button" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</td>
		<td class="nowrap"><?php echo $detail['Product']['bbp_cat']; ?></td>
		<td class="nowrap"><?php echo $detail['Product']['aa_cat']; ?></td>
		<td><?php echo $detail['Product']['description']; ?></td>
		<td class="nowrap"><?php echo $detail['lot']; ?></td>
		<td class="nowrap"><?php echo $detail['quantity']; ?></td>
		<td class="nowrap"><?php echo '$'.money_format('%i', $detail['Product']['price']); ?></td>
		<td class="nowrap"><?php echo '$'.money_format('%i', $detail['Product']['price']*$detail['quantity']); ?></td>
		
		<?php
		//add to running total
		$total += $detail['Product']['price']*$detail['quantity'];
		?>
	</tr>
	<?php } ?> 
	<?php if($total) { ?>
	<tr class="success">
		<td colspan="6">&nbsp;</td>
		<td><strong>Total:</strong></td>
		<td><?php echo '$'.money_format('%i', $total);?></td>
	</tr>
	<?php } ?>
</table>