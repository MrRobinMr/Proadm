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
	<link rel="Stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css">
	<title>Edytowanie użytkownika</title>
</head>
<body>
<div class="tabe">
<div align="center"><p>Edytuj użytkownika</p><br>
<table border="1" style="text-align: center;">
  <tr>
    <td>ID</td><td><?php echo $id ?></td><td></td>
</tr>
	<?php echo form_open("Uzytkownicy/zmiana/$id"); ?>
  <tr>
    <td>E-mail</td><td><?php echo $e_mail;?></td><td><input type="email" placeholder="E mail" name="email" value="<?php echo $e_mail;?>"></td>
  </tr>
  <tr>
    <td>Imie</td><td><?php echo $imie;?></td><td><input type="text" placeholder="Imie" name="imie" value="<?php echo $imie;?>"></td>
  </tr>
  <tr>
    <td>Nazwisko</td><td><?php echo $nazwisko;?></td><td><input type="text" placeholder="Nazwisko" name="nazwisko" value="<?php echo $nazwisko;?>"></td>
  </tr>
	<tr>
    <td>Nowe hasło</td><td></td><td><input type="password" placeholder="Nowe Hasło" name="nhaslo" value=""><br><input type="password" placeholder="Powtórz Nowe Hasło" name="pnhaslo" value=""></td>
  </tr>
  <tr>
    <td>Uprawnienia administratora</td><td><?php if($admin<1){echo "Nie";}else{echo "Tak";}?></td><td><select name="admin"><option <?php if($admin==0){echo "selected";} ?> value="0">Nie</option><option value="1" <?php if($admin!=0){echo "selected";}?>>Tak</option></select></td>
  </tr>
  </table></div>
    <div align="center"><input type="submit"></div><?php echo form_close(); ?>
    </div>
		<div class="back"><a href="<?php echo base_url("Uzytkownicy/index");?>"><h3>&larr;Powrót<h3></a></div>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
