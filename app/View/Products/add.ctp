<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<div class="well">
				<form class="form-horizontal" role="form" method="post">
										
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">BBP Catalog Number</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Product][bbp_cat]" 
								value="<?if(isset($this->request->data['Product']['bbp_cat'])) echo $this->request->data['Product']['bbp_cat'] ?>" 
							>
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Alfa Catalog #</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Product][aa_cat]"
								value="<?if(isset($this->request->data['Product']['bbp_cat'])) echo $this->request->data['Product']['aa_cat'] ?>" 
							>
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Description</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Product][description]"
								value="<?if(isset($this->request->data['Product']['bbp_cat'])) echo $this->request->data['Product']['description'] ?>" 
							>
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Volume</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Product][vol]"
								value="<?if(isset($this->request->data['Product']['bbp_cat'])) echo $this->request->data['Product']['vol'] ?>" 
							>
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Price</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOrder" name="data[Product][price]"
								value="<?if(isset($this->request->data['Product']['bbp_cat'])) echo $this->request->data['Product']['price'] ?>" 
							>
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
