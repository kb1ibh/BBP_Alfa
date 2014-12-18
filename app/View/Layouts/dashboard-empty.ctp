<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title><?=$title_for_layout?> - BBP/Alfa</title>
		<!-- Bootstrap core CSS -->
		<?=$this->Html->css('bootstrap.min.css'); ?>
		<!-- Import Jquery ui CSS-->
		<?=$this->Html->css('jquery-ui');?>
		<!-- Custom styles for this template -->
		<?=$this->Html->css('offcanvas.css'); ?>
		<?=$this->Html->css('custom.css'); ?>
		<?=$this->Html->css('jquery.fancybox.css'); ?>
		<?=$this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'); ?>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<?php echo $this->Html->script('bootstrap.min.js'); ?>
		<?php echo $this->Html->script('jquery.fancybox.pack.js'); ?>
		<?php echo $this->Html->script('jquery-ui.js'); ?>
		
		<script>
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
		</script>
		
	</body>
</html>