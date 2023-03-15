<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
<link rel="Stylesheet" href="<?php echo base_url();?>css/menu_styl.css?a=9?" type="text/css">
<script  src="<?php echo base_url();?>js/czas.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body onload="javascript:zegar()">
<div class="row margin">
  <div class="col-sm-12">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand"><p><h3>	&nbsp;Witaj <?php echo $this->session->userdata('imie');?></h3></p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class=" collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Menu_l');?>">&nbsp;Strona główna</a></li>
	<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Projekty');?>">&nbsp;Projekty</a></li>
  <?php if($this->session->userdata('admin')==1){
    echo '<li class="nav-item"><a class="nav-link" href="';
    echo base_url('Dodawanieprojektu');
    echo '">&nbsp;Dodawanie projektu</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="';
    echo base_url('Dodawanie');;
    echo '">&nbsp;Dodaj użytkownika</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="';
    echo base_url('Uzytkownicy');
    echo '">&nbsp;Zarządzaj użytkownikami</a></li>';
  } ?>
	<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Wyloguj');?>">&nbsp;Wyloguj</a></li>
	</ul>
</div>
<div id="asd">
<span ><h1 id="czas"></h1></span>
</div>
</nav>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
