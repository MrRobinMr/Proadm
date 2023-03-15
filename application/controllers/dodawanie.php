<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler strony dodawania urzytkownika
*
*/

class Dodawanie extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form' ));
		$this->load->library('form_validation');
		$this->load->library('phppass/passwordhash');
		//zzasady walidacji formularzy (email i hasło i potwierdzenie są wymagane)
 		 $this->form_validation->set_rules('imie', 'Imie', 'required');
  	 $this->form_validation->set_rules('nazwisko', 'Nazwisko', 'required');
		 $this->form_validation->set_rules('email', 'Email', 'required');
		 $this->form_validation->set_rules('haslo', 'Hasło', 'required');
     $this->form_validation->set_rules('phaslo', 'Potwierdzenie hasła', 'required|matches[haslo]');
		 $this->load->model('logowanie_konta');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('menu');
			$this->load->view('dodawanieu');
		}
		else
		{
			//przypisanie wpisanych danych z tablicy post do zmiennych jeżeli sa poprawne
			$imie = $this->input->post('imie');
			$nazwisko = $this->input->post('nazwisko');
			$email = $this->input->post('email');
			$dohasla = $this->input->post('haslo');
			$haslo = $this->passwordhash->HashPassword( $dohasla );
//kiedy e-mail istnieje
			if($user = $this->logowanie_konta->istnienie($email)){
				redirect('Dodawanie');

			}
			else{
				$data = array(
   'e_mail' => $email ,
   'nazwisko' => $nazwisko ,
	 'imie' => $imie ,
   'haslo' => $haslo
		);

			$this->db->insert('konta', $data);
			$user = $this->logowanie_konta->logowanie_u($email, $haslo);
			$nazwa = $user['id'];
			redirect('');
			}


		}

}


}
?>
