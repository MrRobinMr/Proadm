<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler strony logowania
*
*/

class Logowanie extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form' ));
		$this->load->library('form_validation');
		$this->load->library('phppass/passwordhash');
		//jak jest zalogowany to przejdz od razu do menu
  //  if(null != $this->session->userdata('id')){

		//	redirect('Menu_l');
		//	Exit();
	//	}

		//zzasady walidacji formularzy (email i hasło są wymagane)
		 $this->form_validation->set_rules('email', 'Email', 'required');
		 $this->form_validation->set_rules('haslo', 'Hasło', 'required');
		 $this->load->model('logowanie_konta');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('logowanieu');
		}
		else
		{
			//przypisanie wpisanych danych z tablicy post do zmiennych
			$email = $this->input->post('email');
			$haslo = $this->input->post('haslo');

			//kiedy dane są poprawne
			if ($user = $this->logowanie_konta->logowanie_u($email, $haslo) ){
				if($this->passwordhash->checkpassword($haslo, $user['haslo'] )){
				$this->session->set_userdata('id', $user['id']);
				$this->session->set_userdata('imie', $user['imie']);
				$this->session->set_userdata('admin', $user['admin']);

				redirect('Menu_l');
}
else
{
echo "<p>Podany e-mail lub hasło jest niepoprawne<p>";
$this->load->view('logowanieu');
}
			}
			//kiedy dane są błędne
			else
		{
		echo "<p>Podany e-mail lub hasło jest niepoprawne<p>";
			$this->load->view('logowanieu');
		}
		}

}

}
?>
