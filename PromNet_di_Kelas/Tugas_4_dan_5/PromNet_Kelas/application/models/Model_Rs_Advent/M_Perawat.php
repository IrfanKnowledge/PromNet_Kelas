<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Perawat extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('perawat');
    return $query->result();
  }
}
?>
