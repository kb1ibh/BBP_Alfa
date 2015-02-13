<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<div class="well">
				<div class="row">
                    <div class="col-md-4 col-md-offset-2 ">
                    	<input type="text" class="form-control" id="productsSearch" placeholder="Search"/>
                    </div>
                    <div class="col-md-4">
                    	<a data-fancybox-type="iframe" href="<?=$this->Html->url('/products/add')?>" type="button" class="fancybox btn btn-success btn-default btn-block">New Product</a>
                    </div>
				</div>
			</div>
		</div>
		<div class="col-md-12" id="productsPagination">
			<!-- products_table element -->
			<?php echo $this->element('Products/products_table', compact('products'));?>
		</div>
		<div class="col-md-12" id="productsResults" >
			
		</div>
		<div class="col-md-12" id="productsPageNumbers">
			<?php echo $this->element('pagination'); ?>
		</div>
	</div>
</div>

<script>
$( document ).ready(function() {
    var typingTimer;                //timer identifier
    var doneTypingInterval = 200;  //time in ms, 5 second for example

    //on keyup, start the countdown
    $('#productsSearch').keyup(function(){
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $('#productsSearch').keydown(function(){
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
        if($("#productsSearch").val().length > 0) {
        	$("#productsPageNumbers").hide();
        	$("#productsPagination").hide();
			$("#productsResults").show();
            $("#productsResults").load(
                "<?=$this->Html->url("ajax_search")?>",
                { "data[q]": $("#productsSearch").val() }
            );
        } else { //empty
        	$("#productsPageNumbers").show();
			$("#productsPagination").show();
			$("#productsResults").hide();
        }
    }
});
</script>