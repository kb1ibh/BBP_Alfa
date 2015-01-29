<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>PO#: <?php echo $order['Order']['po_number']?></h2>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">	
			
			<table class="table-bordered table-condensed table">
				<tr>
					<td class="info"><strong>Invoice #</strong></td>
				</tr>
				<tr>
					<td><?php echo $order['Order']['invoice_number']?></td>
				</tr>
				<tr>
					<td class="info"><strong>Created</strong></td>
				</tr>
				<tr>
					<td>
						<?php
						$time = strtotime($order['Order']['created']);
						echo date("m/d/Y H:ia", $time);
						?>
					</td>
				</tr>
			</table>
			
			<div class="well">
				<div class="btn-group btn-group-xs btn-group-justified btn-block">
					<a type="button" class="btn btn-primary">DOCX</a>
					<a type="button" class="btn btn-default">Invoice</a>
					<a type="button" class="btn btn-warning">PDF</a>
				</div>
				<div class="btn-group btn-group-xs btn-group-justified btn-block">
					<a type="button" class="btn btn-primary">DOCX</a>
					<a type="button" class="btn btn-default">Packing</a>
					<a type="button" class="btn btn-warning">PDF</a>
				</div>
			</div>
			
			<div class="well">
				<h4 class="condensed">Add a Product</h4>
				<!-- <form role="form" method="post" action="<?php echo $this->Html->url('/details/add')?>"> -->
				<? echo $this->Form->create('Detail', array('action' => 'add')) ?>
					<input type="hidden" name="data[Detail][order_id]" value="<?=$id?>">
					<input id="productID" type="hidden" name="data[Detail][product_id]" value="">
					<div class="form-group">
					
						<label for="catalogNumber">Catalog Number</label>
						<input type="text" class="form-control" id="catalogNumber">
					</div>
					<div class="form-group">
						<!-- for display purposes, are not submitted as POST data -->
						<label for="productName">Product Name</label>
						<input type="text" class="form-control" id="productName">
					</div>
					<div class="form-group">
						<? echo $this->Form->input('quantity', array(
							'class' => 'form-control'
						)); ?>
					</div>
					<div class="form-group">
						<? echo $this->Form->input('lot', array(
							'class' => 'form-control',
							'placeholder' => 'Auto'
						)); ?>	
					</div>
					<button id="addProductSubmit" type="submit" class="btn btn-default">Submit</button>
				<? echo $this->Form->end(); ?>
			</div>
			
			<script>
			$(document).ready(function() {
				$( "#catalogNumber" ).autocomplete({
					source: function( request, response ) {
						$.ajax({
							url: "<?=$this->Html->url('/products/autocomplete_search')?>",
							dataType: "json",
							type: "POST",
							data: {
								"data[q]": request.term
							},
							success: function( data ) {
								response( data );
							}
						});
					},
					minLength: 3,
					select: function( event, ui ) {
						$( "#productID" ).val(ui.item.id);
						$( "#productName" ).val(ui.item.description);
					}
					
				});
				$( "#catalogNumber" ).autocomplete( "instance" )._renderItem = function( ul, item ) {
					return $( "<li>" ).append( "<a>" + item.label + "<br>" + item.desc + "</a>" ).appendTo( ul );
				};
			});
			//on submit, 
			$("#catalogNumber").change(function(){
				
			});
			
			</script>

		</div>
		<div class="col-md-9">
			<?php echo $this->element('Details/details_table', compact('order'));?>
		</div>
	</div>
</div>