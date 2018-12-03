<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Tentukan extends CI_Model
{

  function get_record()
  {
    $query = $this->db->get('tentukan');
    return $query->result();
  }
}
?>
