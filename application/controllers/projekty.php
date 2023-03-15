<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler strony z projektami
*
*/

class Projekty extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->database();
		$query = $this->db->get('Projekty');
		$this->load->view('menu');
		$this->load->view('wypisz_projekty');
}
//wypisywanie urzytkownikow po kliknieciu dalej
	public function dodaj_usera($id_p){
		echo '<link rel="Stylesheet" href="';
		echo base_url();
		echo 'css/style.css" type="text/css">';
		echo "<br><br>";
		echo '<div class="tabe" align="center">';
		$this->load->database();
		$this->load->helper('form');
		$pytanie = "SELECT * FROM konta";
		$us = $this->db->query($pytanie);
		echo form_open("Projekty/dodaj_ub/$id_p");
		if ($us->num_rows()>0)
		{
			foreach ($us->result_array() as $row) {
				$id = $row['id'];
				$spr = "SELECT * FROM konta k INNER JOIN pprojekty pp ON k.id = pp.id_konta INNER JOIN projekty p ON p.id = pp.id_projekty WHERE p.id = $id_p AND k.id = $id";
				$istnienie = $this->db->query($spr);
				if($istnienie->num_rows()>0){
				echo '<input type="checkbox" checked name="'.$id.'">'.$row['e_mail'].'<br>';
			}
			else {
				echo '<input type="checkbox" name="'.$id.'">'.$row['e_mail'].'<br>';
			}
			}
		}
		echo '<input type="submit">';
		echo "</form>";
		echo "</div>";
	}

	public function dodaj_ub($id_a){
		$tab = $this->input->post();
		$n = count($tab);
		for ($i=0;$i<$n; $i++){
			echo $tab[$i].'<br>';
		}
	}
}
