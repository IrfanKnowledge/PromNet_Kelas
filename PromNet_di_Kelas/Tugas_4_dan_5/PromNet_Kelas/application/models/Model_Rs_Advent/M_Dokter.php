<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Dokter extends CI_Model
{

  function get_record()
  {
    /*
    $query = $this->db->get('dokter');
    if ($this->db->simple_query("SELECT * FROM dokter") ) {
      echo "berhasil";
    }else {
      echo "gagal";
    }
    */
    /*
    if (isset($_POST['simpan_data']) ) {
      $id_dokter = $_POST['Id_Dokter'];
      //echo "hello";
      print $_POST['Id_Dokter'];
    }
    $kode = 'Do_009';*/
    $query = $this->db->query("SELECT * FROM dokter");
    //print_r($query->result_array());
    //echo "halooooooooooooooooooo";
    return $query->result();
  }
}
?>
