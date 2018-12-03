<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Kamar extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('kamar');
    return $query->result();
  }
}
?>
