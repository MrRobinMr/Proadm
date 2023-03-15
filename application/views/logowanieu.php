<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper(array('form' ,'url'));
$this->load->library('form_validation');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logowanie</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link rel="Stylesheet" href="<?php echo base_url();?>css/style.css?v=1?" type="text/css">
</head>
<body>
	<div align="center" class="">
<div class="align-middle col-md-offset-3 col-md-6 col-md-offset-3 logowaniea">
<br>
<br>
<br>
<br>
<br>
<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Logowanie'); ?>

	<h1>Logowanie</h1>
	<div class="kratka ">
		<input type="email" placeholder="E mail" name="email" value="">
	</div>
	<div class="kratka">
		<input type="password" placeholder="Hasło" name="haslo" value="">
	</div>
	<center>
		<input class="zaloguj"  type="submit" value="Zaloguj">
	</center>
	<?php echo form_close(); ?>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
