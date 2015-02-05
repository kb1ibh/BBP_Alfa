<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<div class="well">
				<form class="form-horizontal" role="form" method="post">
										
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Quantity</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Detail][quantity]" value="<?=$detail['Detail']['quantity']?>">
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Lot #</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Detail][lot]" value="<?=$detail['Detail']['lot']?>">
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-default btn-primary">Save</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
