<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler wyświetlania urzytkowników
*
*/

class Uzytkownicy extends CI_Controller {
  function __construct()
  {
    parent::__construct();
  }

  //funkcja wypisywania użytkowników
  public function index(){
    $this->load->view('menu');
    $this->load->database();
    $query = $this->db->get('konta');
    $this->load->view('wypisywanie_users');
}
//wypisywanie okna edycji urzytkownika
public function user($id)
 {
   $this->load->helper('url');
   $this->load->database();
   $query = $this->db->get_where('konta', array('id' => $id));
   $user = $query->row_array();
   $this->load->view('edycjau', $user);
 }
 //potwierdzenie usuwania
 public function usuwanie($id)
 {
   echo '<link rel="Stylesheet" href="'.base_url().'css/style.css?v=1?" type="text/css">';
   echo '<div style="display: flex; justyfy-content:center;">';
   echo "<h2>Czy na pewno chcesz usunąć użytkownika<h2><br>";
   echo '<a href="'.base_url("Uzytkownicy/usun/$id").'">Tak</a><a href="'.base_url('Uzytkownicy').'">Nie</a>';
   echo "</div>";
 }
 //usuwanie urzytkownika
 public function usun($id)
 {
      $this->load->model('Usuwanie_konta');
      $this->Usuwanie_konta->usun($id);
      redirect('Uzytkownicy');
 }
 //edycja istniejącego użytkownika
 public function zmiana($id){
   $this->load->helper(array('form' ));
   $this->load->library('form_validation');
   $this->load->library('phppass/passwordhash');
    $this->load->model('logowanie_konta');
    $this->load->database();
    $query = $this->db->get_where('konta', array('id' => $id));
    $user = $query->row_array();
    $this->form_validation->set_rules('email', 'E-mail', 'required');
    if($this->form_validation->run() == FALSE)
		{
    	$this->load->view('edycjau', $user);
    }else
		{
			//przypisanie wpisanych danych z tablicy post do zmiennych
      $email = $this->input->post('email');
      $imie = $this->input->post('imie');
      $nazwisko = $this->input->post('nazwisko');
      $nhaslo = $this->input->post('nhaslo');
      $pnhaslo = $this->input->post('pnhaslo');
      $admin = $this->input->post('admin');
      $queryy = $this->db->get_where('konta', array('e_mail' => $email));
      $tab = $queryy->row_array();
      if($email == $user['e_mail'] | $tab == null)
      {
            if($nhaslo == $pnhaslo && $nhaslo!=null)
            {
              $zhaslo = $this->passwordhash->HashPassword( $nhaslo );
              $data = array(
               'e_mail' => $email,
               'imie' => $imie,
               'nazwisko' => $nazwisko,
               'haslo' => $zhaslo,
               'admin' => $admin
            );
            $this->db->where('id', $id);
            $this->db->update('konta', $data);
            	redirect('Uzytkownicy');
            }
            elseif($nhaslo==null && $pnhaslo == null) {
              $data = array(
               'e_mail' => $email,
               'imie' => $imie,
               'nazwisko' => $nazwisko,
               'admin' => $admin
            );
            $this->db->where('id', $id);
            $this->db->update('konta', $data);
            redirect('Uzytkownicy');
            }
      }
      else{
      $this->load->view('edycjau', $user);
 }
}
}
}
