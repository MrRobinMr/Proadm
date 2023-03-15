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
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
<link rel="Stylesheet" href="<?php echo base_url();?>css/style.css?v=1?" type="text/css">
</head>
<body>
	<p><?php echo validation_errors(); ?></p>
	<?php echo form_open('Dodawanie'); ?>
<div class="logowaniea">


	<h1>Dodaj użytkownika</h1>

	<div class="kratka">
		<input type="text" placeholder="Imie" name="imie" value="">
	</div>
	<div class="kratka">
		<input type="text" placeholder="Nazwisko" name="nazwisko" value="">
	</div>
	<div class="kratka">
		<input type="email" placeholder="E mail" name="email" value="">
	</div>
	<div class="kratka">
		<input type="password" placeholder="Hasło" name="haslo" value="">
	</div>
  <div class="kratka">
		<input type="password" placeholder="Potwierdz hasło" name="phaslo" value="">
	</div>


	<center>
		<input class="zaloguj"  type="submit" value="Zarejstrój">
	</center>

</div>
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
