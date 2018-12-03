<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Periksa extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('periksa');
    return $query->result();
  }
}
?>
