<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>Packing</title>
		
		<style type="text/css">
		#bodycontainer
		{
			border: 1px black solid;
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
		table,th, td
		{
			border: 1px solid black;
			padding:2px;
		}
		table.grey, th.grey, td.grey
		{
			background-color:#ccc;
			width:100px;
			font-size:10px;
		}
		tr, #totals
		{
			page-break-before:auto;
		}
		#totals
		{
			align:right;
		}
		
		</style>
		
	</head>
	<body>
		<div id="bodycontainer">
			<center>
				<h1>Packing Slip</h1>
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
			
				
			</table>
			
			<br/>
			<br/>
			
			<div style="float:left; width:49%">
			<strong>Ship To:</strong>
			</div>
			
			<div class="clear"></div>
			<hr>
			

			<div style="float:left; width:49%">
			Alfa Aesar / Johnson Matthey<br/>
			220 Neck Road<br/>
			Ward Hill, MA 01835-6904<br/>
			</div>
			
			<div class="clear"></div>
			
			<br/>
			<br/>
			<div id="totals">
			<table>
				<thead>
					<tr>
						<td width="80" class="grey">AA Catalog</td>
						<td width="40" class="grey">BBP Catalog</td>
						<td class="grey">Description</td>
						<td width="20" class="grey">Volume</td>
						<td width="20" class="grey">Lot</td>
						<td width="20" class="grey">Quantity</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($order['Detail'] as $detail)
				{
				?>
				<tr>
					<td><?=$detail['Product']['aa_cat']?></td>
					<td><?=$detail['Product']['bbp_cat']?></td>
					<td><?=$detail['Product']['description']?></td>
					<td><?=$detail['Product']['vol']?></td>
					<td><?=$detail['lot']?></td>
					<td><?=$detail['quantity']?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<br/>
	
			
			<div class="clear"></div>
			
			<center><h6>
			Please make all checks payable to Boston BioProducts, Inc. 159 Chestnut St. Ashland, MA 01721</br>
			If you have any questions concerning this invoice please call: (508) 231-4777
			</h6>
			<h5>Thank you for your Business!</h5>
			</center>
			</div>
		</div>
		
	</body>
</html>