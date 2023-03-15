<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper(array('form' ,'url'));
$this->load->database();
$this->load->library('form_validation');
$id = $this->session->userdata('id');
if ($this->session->userdata('admin')==1){
	$zap = 'SELECT * FROM projekty';
}
else{
$zap = 'SELECT * FROM projekty p INNER JOIN pprojekty pp ON p.id = pp.id_projekty WHERE pp.id_konta = '.$id;
}
$query = $this->db->query($zap);
?>
<!DOCTYPE html>
<html lang="pl">
<head> <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link rel="Stylesheet" href="<?php echo base_url();?>css/style.css?v=2?" type="text/css">
	<title>Projekty</title>
</head>
<body>
<div class="tabe">
<table border="1" style="text-align: center;">


    <?php if ($query->num_rows() > 0)
	  {
	     foreach ($query->result_array() as $pro)
	     {
					echo '<div class="pro" >';
					echo "<h2>".$pro['nazwa']."</h2>";
					echo "<br>";
	        echo $pro['opis'];
					echo "<br>";
	        echo $pro['data_rozpoczecia']." : ";
	        echo $pro['data_zakaczenia']."<br>";
					$czastrwania = (strtotime($pro['data_rozpoczecia']) - strtotime($pro['data_zakaczenia'])) / (60*60*24);
					$dzis = date("Y-m-d");
					$wykonane = (strtotime($pro['data_rozpoczecia']) - strtotime($dzis)) / (60*60*24);
					$idp = $pro['id'];
					$zapy = "SELECT * FROM konta k INNER JOIN pprojekty pp ON k.id=pp.id_konta WHERE pp.id_projekty = $idp";
					$users = $this->db->query($zapy);
					if ($users->num_rows()>0)
					{
						foreach ($users->result_array() as $value) {
							echo $value['imie']." ";
							echo $value['nazwisko'].", ";
						}
						echo "<br>";
					}
					if($this->session->userdata('admin')==1){
					echo '<a href="';
					$a = $pro['id'];
					echo base_url("Projekty/dodaj_usera/$a");
					echo '">Dodaj</a>';
				}
					echo "</div>";
					echo "<br>";
	     }
	  }
		else
		{
			echo "Brak projektów";
		} ?>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
