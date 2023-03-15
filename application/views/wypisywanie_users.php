<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper(array('form' ,'url'));
$this->load->database();
$this->load->library('form_validation');
$query = $this->db->get('konta');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link rel="Stylesheet" href="<?php echo base_url();?>css/style.css?v=5?" type="text/css">
	<title>Edytowanie użytkownika</title>
</head>
<body>
<div class="tabe table-responsive" style=" display:flex;">
<table border="1" class="table" style="text-align: center;">
<thead class="">
	<tr>
    <th scope="col"><b>Imie</b></th>
    <th scope="col"><b>Nazwisko</b></th>
    <th scope="col"><b>E-mail</b></th>
    <th scope="col"><b>Uprawnienia administratora</b></th>
	</tr>
</thead>
    <?php if ($query->num_rows() > 0)
    {
       foreach ($query->result_array() as $row)
       {

         echo"<tr>";
         echo "<td>";
          echo $row['imie'];
          echo "</td>";
          echo "<td>";
          echo $row['nazwisko'];
          echo "</td>";
          echo "<td>";
          echo $row['e_mail'];
          echo "</td>";
          echo "<td>";
          if($row['admin']>0)
          {
            echo "Tak";
          }
          else
          {
            echo "Nie";
          }
          echo "</td>";
					$id=$row['id'];
					$funkcja= base_url("Uzytkownicy/user/$id");
					echo "<td>";
					echo "<a href=".$funkcja.">Edytuj</a>";
					echo "</td>";
					echo "<td>";
					$usun = base_url("Uzytkownicy/usuwanie/$id");
					echo '<a class="usun" href="'.$usun.'">Usuń</a>';
					echo "</td>";
          echo "</tr>";


       }
    } ?>
    </table>
		</div>
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
