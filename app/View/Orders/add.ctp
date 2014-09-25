<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<div class="well">
				<form class="form-horizontal" role="form" method="post">
					<div class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-3 control-label">Order #</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="data[Order][po_number]">
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" name="data[redirect]" value="orders" class="btn btn-default btn-primary">Save</button>
							<button type="submit" name="data[redirect]" value="details" class="btn btn-default btn-primary">Save and Edit Details</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
