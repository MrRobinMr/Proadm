<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*kontroler wylogowania
*
*/

class Wyloguj extends CI_Controller {
  //funkcja wylogowywania
  public function index(){
    $this->session->sess_destroy();
    redirect('logowanie');
  }
}
