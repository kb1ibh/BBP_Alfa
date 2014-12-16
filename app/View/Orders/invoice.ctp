<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>Invoice</title>
		
		<style type="text/css">
		#bodycontainer
		{
			width: 800px;
			padding: 5px;
		}
		#companyinfo
		{
			float:left;
		}
		.clear 
		{
			clear: both;
		}
		table
		{
			border-collapse:collapse;
		}
		table, th, td
		{
			border: 1px solid black;
			padding:2px;
		}
		table.grey, th.grey, td.grey
		{
			background-color:#ccc;
			width:100px;
		}
		tr
		{
			page-break-inside: avoid;
		}
		
		</style>
		
	</head>
	<body>
		<div id="bodycontainer">
			<center>
				<h1>Invoice</h1>
			</center>
			<hr/>
			
			<div id="companyinfo">
				<strong>Boston BioPoducts Inc.</strong><br/>
				159 Chestnut St.<br/>
				Ashland, MA 01721<br/>
				Phone: <i>(508) 231-4777</i>  Fax: <i>(508) 231-4778</i><br/>
				Email: <i>Info@BostonBioProducts.com</i><br/>
				<i>Http://www.BostonBioProducts.com</i><br/>
			</div>
			
			
			<div class="clear"></div>
			
			<table width="100%">
				<tr>
					<td class="grey" width="104">PO Number</td>
					<td width="160"><?=$order['Order']['po_number']?></td>
					<td class="grey"width="104">Invoice Date</td>
					<td width="160"><?=date("m/d/y");?></td>
					<td class="grey"width="104">Order Date</td>
					<td width="160"><?=date('m/d/Y',strtotime($order['Order']['created']));?></td>
				</tr>
				<tr>
					<td class="grey">Contact Name</td>
					<td>ALFA AESAR</td>
					<td class="grey">Invoice #</td>
					<td><?=$order['Order']['invoice_number']?></td>
					<td class="grey">Ship Via</td>
					<td></td>
				</tr>
				
			</table>
			
			<br/>
			<br/>
			
			
			<table style="border:0px;">
				<tr style="border:0px;">
					<td width="400" style="border:0px;">Bill To:</td>
					<td style="border:0px;">Ship To:</td>
				</tr>
			</table>
			
			
					
			<div class="clear"></div>
			<hr>			
			<table style="border:0px;">
				<tr >
					<td style="border:0px;" width="400">
						<?=$order['Billing']['name']?><br/>
						<?=$order['Billing']['address1']?><br/>
						<? if(strlen($order['Billing']['address2']) != 0) { echo $order['Billing']['address2']."</br>"; }?>
						<?=$order['Billing']['city']?>, <?=$order['Billing']['state']?> <?=$order['Billing']['zip']?><br/></td>
					<td style="border:0px;"><?=$order['Shipping']['name']?><br/>
						<?=$order['Shipping']['address1']?><br/>
						<? if(strlen($order['Shipping']['address2']) != 0) {echo $order['Shipping']['address2']."</br>";}?>
						<?=$order['Shipping']['city']?>, <?=$order['Shipping']['state']?> <?=$order['Shipping']['zip']?><br/></td>
				</tr>
			</table>
			
			
			
			
			<div class="clear"></div>
			
			<br/>
			<br/>
			
			<table width="100%">
				<thead>
					<tr>
						<td width="20" class="grey">AA Catalog</td>
						<td width="20" class="grey">BBP Catalog</td>
						<td width="20" class="grey">Description</td>
						<td width="20" class="grey">Quantity</td>
						<td width="30" class="grey">Price</td>
						<td width="30" class="grey">SubTotal</td>
					</tr>
				</thead>
				<tbody>
				<?php
				$total = 0;
				foreach($order['Detail'] as $detail)
				{
				$total += $detail['Product']['price'] * $detail['quantity'];
				?>
				<tr>
					<td width="20"><?=$detail['Product']['aa_cat']?></td>
					<td width="20"><?=$detail['Product']['bbp_cat']?></td>
					<td width="20"><?=$detail['Product']['description']?></td>
					<td width="20"><?=$detail['quantity']?></td>
					<td width="30">$<?=money_format('%i', $detail['Product']['price']) . "\n";?></td>
					<td width="30">$<?=money_format('%i', $detail['Product']['price'] * $detail['quantity']) . "\n";?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<br/>
			<div>
				<table style="border:0px;">
						<tr>
							<td width="550" style="border:0px;">&nbsp</td>
							<td width="20">Subtotal</td>
							<td width="20">$<?=money_format('%i', $total)?></td>
						</tr>
						<tr>
							<td style="border:0px;"></td>	
							<td width="20" class="grey">Total Due</td>
							<td width="20" class="grey"><strong>$<?=money_format('%i', $total)?></strong></td>
						</tr>
				</table>
			</div>
			
			<div class="clear"></div>
			
			<center><h6>
			Please make all checks payable to Boton BioProducts, Inc. 159 Chestnut St. Ashland, MA 01721</br>
			If you have any Questions Concerning this Invoice, Please call: (508) 231-4777
			</h6>
			<h5>Thank you for your Business!</h5>
			</center>
			
		</div>
		
	</body>
</html>