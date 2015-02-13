<div class="container">
	<div class="row">
		<div class="col-md-3">	
			<div class="well">
				<a data-fancybox-type="iframe" href="<?=$this->Html->url('/orders/add')?>" class="btn btn-primary btn-block fancybox">New Order</a>
			</div>
			<div class="well">
				<input class="form-control" id="orderSearch" placeholder="Search">
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12" id="orderPagination">
					<!-- products_table element -->
					<?php echo $this->element('Orders/orders_table', compact('orders'));?>
				</div>
				<div class="col-md-12" id="orderResults" >
					
				</div>
				<div class="col-md-12" id="orderPageNumbers">
					<?php echo $this->element('pagination'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$( document ).ready(function() {
    var typingTimer;                //timer identifier
    var doneTypingInterval = 200;  //time in ms, 5 second for example

    //on keyup, start the countdown
    $('#orderSearch').keyup(function(){
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $('#orderSearch').keydown(function(){
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
        if($("#orderSearch").val().length > 0) {
        	$("#orderPageNumbers").hide();
        	$("#orderPagination").hide();
			$("#orderResults").show();
            $("#orderResults").load(
                "<?=$this->Html->url("ajax_search")?>",
                { "data[q]": $("#orderSearch").val() }
            );
        } else { //empty
        	$("#orderPageNumbers").show();
			$("#orderPagination").show();
			$("#orderResults").hide();
        }
    }
});
</script>