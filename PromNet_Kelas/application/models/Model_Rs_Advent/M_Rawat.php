<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Rawat extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('rawat');
    return $query->result();
  }
}
?>
