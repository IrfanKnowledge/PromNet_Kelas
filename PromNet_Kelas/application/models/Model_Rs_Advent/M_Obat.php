<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Obat extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('obat');
    return $query->result();
  }
}
?>
