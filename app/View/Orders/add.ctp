<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<div class="well">
				<form class="form-horizontal" role="form" method="post">
					<div id="orderGroup" class="form-group has-feedback"> 
						<label for="inputOrder" class="col-sm-3 control-label">Order #</label>
						<div class="col-sm-9">
							<input type="text" onkeyup="updateFeedback(this.value)" class="form-control" id="inputOrder" name="data[Order][po_number]">
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

<script>
// Execute ajax request to update 
var delayTimer;
function updateFeedback(text) { 
	clearTimeout(delayTimer);
	//after keydown timeout, 
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
	}, 150); // how long to delay ajax in ms
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