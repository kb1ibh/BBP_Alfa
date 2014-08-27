<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Alfa Orders</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li<? if($section == "orders") { echo ' class="active"'; } ?>>
					<?=$this->Html->link('Orders', '/orders')?>
				</li>
				<li<? if($section == "products") { echo ' class="active"'; } ?>>
					<?=$this->Html->link('Products', '/products')?>
				</li>
			</ul>
		</div>
	</div>
</div>