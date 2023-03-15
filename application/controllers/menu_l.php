<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler strony logowania
*
*/

class Menu_l extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 	}

	public function index()
	{
		//jak sesja wygaśnie wraca do logowaniea
		if(null == $this->session->userdata('id')){
			redirect('logowanie');
			Exit();
		}

		$this->load->view('menu');


			}
		}


?>
