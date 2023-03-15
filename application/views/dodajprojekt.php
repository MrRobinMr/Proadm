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
	</style>
</head>
<body>
	<p><?php echo validation_errors(); ?></p>
	<?php echo form_open('Dodawanieprojektu/projekt'); ?>


<div class="logowaniea">


	<h1>Dodaj projekt</h1>

	<div class="kratka">
		<input type="text" placeholder="Nazwa" name="nazwa" value="">
	</div>
	<div class="kratka">
		<input type="textarea" placeholder="Opis" name="opis" value="">
	</div>
	<div class="kratka">
		<p class="daty">Data rozpoczęcia</p>
		<input type="date" placeholder="Data rozpoczęcia" name="datarozpoczecia" value="data">
	</div>
	<div class="kratka">
		<p class="daty">Data zakończenia</p>
		<input type="date" placeholder="Data zakończenia" name="datazakonsczenia" value="">
	</div>
	<center>
		<input class="zaloguj"  type="submit" value="Zapisz">
	</center>

</div>
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
