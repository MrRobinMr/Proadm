<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**Klasa logowania się urzytkownika.
 *
 */
class Logowanie_konta extends CI_Model
{

  public $table = 'konta';

  public function logowanie_u($email, $haslo)
  {
    $this->load->database();
    return $this->db->where(array('e_mail' => $email))->get($this->table)->row_array();

  }
  public function istnienie($email)
  {
    $this->load->database();
    return $this->db->where(array('e_mail' => $email))->get($this->table)->row_array();
  }
  public function istnienie_projektu($nazwa)
  {
    $this->load->database();
    return $this->db->where(array('nazwa' => $nazwa, 'zakonczone' => FALSE))->get('projekty')->row_array();
  }
}
