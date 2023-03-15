<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler strony dodawania projektu
*
*/

class Dodawanieprojektu extends CI_Controller {

	public function index()
	{
    $this->load->view('menu');
    $this->load->view('dodajprojekt');
  }
	public function projekt()
	{
		$this->load->helper(array('form' ));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nazwa', 'Nazwa', 'required');
		$this->form_validation->set_rules('opis', 'Opis', 'required');
		$this->form_validation->set_rules('datarozpoczecia', 'Data rozpoczęcia', 'required');
		$this->form_validation->set_rules('datazakonsczenia', 'Data zakończenia', 'required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Dodawanieprojektu');
		}
		else
		{
			$nazwa = $this->input->post('nazwa');
			$opis = $this->input->post('opis');
			$dataroz = $this->input->post('datarozpoczecia');
			$datazak = $this->input->post('datazakonsczenia');
			$zak = FALSE;
			$this->load->model('logowanie_konta');

			if($user = $this->logowanie_konta->istnienie_projektu($nazwa)){
				redirect('Dodawanieprojektu');
			}
			else
			{
				$data = array(
   'nazwa' => $nazwa ,
   'opis' => $opis ,
	 'data_rozpoczecia' => $dataroz ,
   'data_zakaczenia' => $datazak,
	 'zakonczone' => $zak
		);

			$this->db->insert('projekty', $data);
			redirect('Dodawanieprojektu');
			}
		}
	}
}
