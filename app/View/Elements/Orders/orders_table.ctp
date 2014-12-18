<table class="table table-striped">
	<thead>
        <tr>
			<th>PO #</th>
			<th>Invoice #</th>
			<th>Date</th>
			<th>Items</th>
			<th>Total</th>
			<th>Details</th>
			<th>Invoice</th>
			<th>Packing</th>
        </tr>
	</thead>
	<tbody>
		<? foreach($orders as $order) { ?>
        <tr>
			<td><?=$order['Order']['po_number']?></td>
			<td><?=$order['Order']['invoice_number']?></td>
			<td>
				<?php
				$time = strtotime($order['Order']['created']);
				echo date("m/d/Y H:ia", $time);
				?>
			</td>
			<td>
				<?=count($order['Detail'])?>
			</td>
			<td>
				<?php 
				$total = 0;
				foreach($order['Detail'] as $detail) {
					$total += $detail['quantity'] * $detail['Product']['price'];
				}
				echo '$'.money_format('%i', $total);
				?>
			</td>
			<td>
				<a href="<?=$this->Html->url('/orders/details/'.$order['Order']['id'])?>" class="btn btn-success btn-xs">Details</button>
			</td>
			<td>
				<div class="btn-group btn-group-xs">
					<a href="<?=$this->Html->url('/order/invoice/'.$order['Order']['id'])?>" class="btn btn-primary">DOCX</a>
					<button type="button" class="btn btn-warning">PDF</button>
				</div>
			</td>
			<td>
				<div class="btn-group btn-group-xs">
					<a href="<?=$this->Html->url('/order/packing/'.$order['Order']['id'])?>" class="btn btn-primary">DOCX</a>
					<button type="button" class="btn btn-warning">PDF</button>
				</div>
			</td>
        </tr>
		<? } ?>
	</tbody>
</table>