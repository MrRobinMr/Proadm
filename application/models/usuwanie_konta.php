<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**Klasa logowania się urzytkownika.
 *
 */
class Usuwanie_konta extends CI_Model
{
  public function usun($id){
    $this->load->database();
    $query = "DELETE FROM konta WHERE id = $id";
    $this->db->query($query);
    redirect('Uzytkownicy');

  }
}
