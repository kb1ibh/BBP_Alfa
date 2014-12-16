<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<div class="well">
				<form class="form-horizontal" role="form" method="post">
				
					<div class="form-group">
						<label class="col-sm-4 control-label">Shipping Address:</label>
						<div class="col-sm-8">
							<div class="radio">
								<? foreach($shipping as $key => $ship) { ?>
								<div class="radio">
									<label>
										<input type="radio" name="data[Order][shipping_id]" id="optionsShipping" value="<?=$ship['Shipping']['id']?>" <?if($key == 0) echo 'checked';?>>
										<?=$ship['Shipping']['address1'].' '.$ship['Shipping']['address2'].' '.$ship['Shipping']['city'].', '.$ship['Shipping']['state'].' ',$ship['Shipping']['zip']?>
									</label>
								</div>
								<?}?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label">Billing Address:</label>
						<div class="col-sm-8">
							<div class="radio">
								<? foreach($billing as $key => $bill) { ?>
								<div class="radio">
									<label>
										<input type="radio" name="data[Order][billing_id]" id="optionsBilling" value="<?=$bill['Billing']['id']?>" <?if($key == 0) echo 'checked';?>>
										<?=$bill['Billing']['address1'].' '.$bill['Billing']['address2'].' '.$bill['Billing']['city'].', '.$bill['Billing']['state'].' ',$bill['Billing']['zip']?>
									</label>
								</div>
								<?}?>
							</div>
						</div>
					</div>
										
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-4 control-label">Order #</label>
						<div class="col-sm-8">
							<input type="text" onkeyup="updateFeedback(this.value)" class="form-control" id="inputOrder" name="data[Order][po_number]">
							<span id="idFeedback" class="glyphicon form-control-feedback"></span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" name="data[redirect]" value="orders" class="btn btn-default btn-primary">Save</button>
							<button type="submit" name="data[redirect]" value="details" class="btn btn-default btn-primary">Save and Edit Details</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

<script>
// Execute ajax request to update 
var delayTimer;
function updateFeedback(text) { 
	clearTimeout(delayTimer);
	//after keydown timeout, run ajax function
	delayTimer = setTimeout(function() {
		var loadUrl = '<?=$this->Html->url('/orders/ajax_order_number')?>';
		$.post(
			loadUrl,
			{ data: { orderNumber: text } },
			function(responseText){
				var parsedResponse = jQuery.parseJSON(responseText);
				if(parsedResponse.duplicate == true) {
					feedbackError();
				} else if(parsedResponse.duplicate == false) {
					feedbackSuccess();
				}
			},
			"html"
		);
	}, 300); // how long to delay ajax in ms
}

//clear form of success/error feedback
function feedbackSuccess() {
	$("#orderGroup").removeClass("has-error").addClass("has-success");
	$("#idFeedback").removeClass("glyphicon-remove").addClass("glyphicon-ok");
}

//clear form of success/error feedback
function feedbackError() {
	$("#orderGroup").removeClass("has-success").addClass("has-error");
	$("#idFeedback").removeClass("glyphicon-ok").addClass("glyphicon-remove");
}

</script>