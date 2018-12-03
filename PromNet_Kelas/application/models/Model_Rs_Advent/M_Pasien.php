<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Pasien extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('pasien');
    return $query->result();
  }
}
?>
