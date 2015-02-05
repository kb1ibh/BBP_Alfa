<table class="table table-striped">
	<tr>
		<td>PO#</td>
		<td>Items</td>
		<td>Total</td>
	</tr>
	<? foreach($product['Detail'] as $detail) { ?>
		<?php 
		$items = count($detail['Order']['Detail']);
		$itemsTotal = 0;
		foreach( $detail['Order']['Detail'] as $deepDetail) {
			$itemsTotal += $deepDetail['quantity'] * $deepDetail['Product']['price'];
		}
		?>
	<tr>
		<td><a href="<?=$this->Html->url('/fancybox/redirect/orders/details/'.$detail['Order']['id'])?>?>"><?=$detail['Order']['po_number']?></a></td>
		<td><?=$items?></td>
		<td>$<?=money_format('%i', $itemsTotal)?></td>
	</tr>
	<? } ?>
</table>