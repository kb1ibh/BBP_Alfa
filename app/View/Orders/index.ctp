<div class="container">
	<div class="row">
		<div class="col-md-3">	
			<div class="well">
				<button type="button" class="btn btn-primary btn-block">New Order</button>
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