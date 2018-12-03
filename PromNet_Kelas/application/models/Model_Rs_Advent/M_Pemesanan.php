<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_Pemesanan extends CI_Model
{
  public $Nama;
  public $Jenis_Kelamin;
  public $Alamat;
  public $No_Telepon;
  public $Paket;
  public $Jumlah_Pemesanan;
  public $Tanggal_Pemesanan;
  public $Total_Bayar;


  function insert_entry()
  {
    $this->Nama = $_POST['Nama'];
    $this->Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $this->Alamat = $_POST['Alamat'];
    $this->No_Telepon = $_POST['No_Telepon'];
    $this->Paket = $_POST['Paket'];
    $this->Jumlah_Pemesanan = $_POST['Jumlah_Pemesanan'];

    $querry = $this->db->query('SELECT CURRENT_DATE() as Tanggal_Pemesanan');
    $temp = $querry->result_array();

    $this->Tanggal_Pemesanan = $temp[0]['Tanggal_Pemesanan'];

    if ($this->Paket == 'Silver') {
      $this->Total_Bayar = $this->Jumlah_Pemesanan * 500000;
    }else{
      $this->Total_Bayar = $this->Jumlah_Pemesanan * 250000;
    }

    if (! $this->db->simple_query("INSERT INTO transaksi VALUES
          ('0',
            '$this->Nama',
            '$this->Jenis_Kelamin',
            '$this->Alamat',
            '$this->No_Telepon', '$this->Paket',
            '$this->Jumlah_Pemesanan',
            '$this->Tanggal_Pemesanan',
            '$this->Total_Bayar'
          )
          ")
        ){
      $error = $this->db->error();
      return $error;
    }else{
      $error = 'Berhasil';
      return $error;
    }
  }
  function get_record()
  {
    $query = $this->db->get('transaksi');
    return $query->result();
  }

}
?>
