<div class="container">
	<div class="row">
		<div class="col-md-3">	
			<div class="well">
				<a data-fancybox-type="iframe" href="<?=$this->Html->url('/orders/add')?>" class="btn btn-primary btn-block fancybox">New Order</a>
			</div>
			<div class="well">
				<input class="form-control" placeholder="Search">
			</div>
		</div>
		<div class="col-md-9">
			<?php echo $this->element('Orders/orders_table', compact('orders'));?>
			<?php echo $this->element('pagination'); ?>
		</div>
	</div>
</div>