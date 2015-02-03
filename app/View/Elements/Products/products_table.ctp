<table class="table table-striped">
	<tr>
  		<td> BBP Catalog # </td>
  		<td> Alfa Catalog # </td>
  		<td> Description </td>
  		<td> Volume </td>
  		<td> Price </td>
  		<td> &nbsp; </td>
		</tr>
	<?php foreach($products as $product) { ?>
    	<tr>
  			<td> <?=$product['Product']['bbp_cat']?> </td>
  			<td> <?=$product['Product']['aa_cat']?> </td>
  			<td> <?=$product['Product']['description']?> </td>
  			<td> <?=$product['Product']['vol']?> </td>
  			<td> $<?=money_format('%i', $product['Product']['price'])?> </td>
  			<td> 
  				<a href="#" class="btn btn-xs btn-warning">Edit</a>
  				<a href="#" class="btn btn-xs btn-danger">Delete</a> 
  			</td>
		</tr>
    <? } ?>
</table>