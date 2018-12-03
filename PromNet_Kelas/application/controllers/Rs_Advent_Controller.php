<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**public function __construct()
{
  parent::__construct();
  $this->load->model('RS_Advent_Model');
  $this->load->helper('url_helper');
}
public function index()
{
   $data['dokter'] = $this->RS_Advent_Model->get_db();
}

public function view()
{
  $this->load->view('RS_Advent_View');
}
 *
*/
class Rs_Advent_Controller extends CI_Controller
{
    public function view_ERD()
    {
      $this->load->view('View_Rs_Advent/V_ERD.php');
    }
    public function view_dokter()
    {
      $this->load->model('Model_Rs_Advent/M_Dokter');
      $this->M_Dokter->get_record();
      $data['Dokter'] = $this->M_Dokter->get_record();
      $this->load->view('View_Rs_Advent/V_Dokter.php', $data);
    }
    public function view_huni()
    {
      $this->load->model('Model_Rs_Advent/M_Huni');
      $data['Huni'] = $this->M_Huni->get_record();
      $this->load->view('View_Rs_Advent/V_Huni.php', $data);
    }
    public function view_kamar()
    {
      $this->load->model('Model_Rs_Advent/M_Kamar');
      $data['Kamar'] = $this->M_Kamar->get_record();
      $this->load->view('View_Rs_Advent/V_Kamar.php', $data);
    }
    public function view_obat()
    {
      $this->load->model('Model_Rs_Advent/M_Obat');
      $data['Obat'] = $this->M_Obat->get_record();
      $this->load->view('View_Rs_Advent/V_Obat.php', $data);
    }
    public function view_pasien()
    {
      $this->load->model('Model_Rs_Advent/M_Pasien');
      $data['Pasien'] = $this->M_Pasien->get_record();
      $this->load->view('View_Rs_Advent/V_Pasien.php', $data);
    }
    public function view_perawat()
    {
      $this->load->model('Model_Rs_Advent/M_Perawat');
      $data['Perawat'] = $this->M_Perawat->get_record();
      $this->load->view('View_Rs_Advent/V_Perawat.php', $data);
    }
    public function view_periksa()
    {
      $this->load->model('Model_Rs_Advent/M_Periksa');
      $data['Periksa'] = $this->M_Periksa->get_record();
      $this->load->view('View_Rs_Advent/V_Periksa.php', $data);
    }
    public function view_rawat()
    {
      $this->load->model('Model_Rs_Advent/M_Rawat');
      $data['Rawat'] = $this->M_Rawat->get_record();
      $this->load->view('View_Rs_Advent/V_Rawat.php', $data);
    }
    public function view_tentukan()
    {
      $this->load->model('Model_Rs_Advent/M_Tentukan');
      $data['Tentukan'] = $this->M_Tentukan->get_record();
      $this->load->view('View_Rs_Advent/V_Tentukan.php', $data);
    }
    public function view_all_tables()
    {
      $this->load->model('Model_Rs_Advent/M_Dokter');
      $data['Dokter'] = $this->M_Dokter->get_record();

      $this->load->model('Model_Rs_Advent/M_Huni');
      $data['Huni'] = $this->M_Huni->get_record();

      $this->load->model('Model_Rs_Advent/M_Kamar');
      $data['Kamar'] = $this->M_Kamar->get_record();

      $this->load->model('Model_Rs_Advent/M_Obat');
      $data['Obat'] = $this->M_Obat->get_record();

      $this->load->model('Model_Rs_Advent/M_Pasien');
      $data['Pasien'] = $this->M_Pasien->get_record();

      $this->load->model('Model_Rs_Advent/M_Perawat');
      $data['Perawat'] = $this->M_Perawat->get_record();

      $this->load->model('Model_Rs_Advent/M_Periksa');
      $data['Periksa'] = $this->M_Periksa->get_record();

      $this->load->model('Model_Rs_Advent/M_Rawat');
      $data['Rawat'] = $this->M_Rawat->get_record();

      $this->load->model('Model_Rs_Advent/M_Tentukan');
      $data['Tentukan'] = $this->M_Tentukan->get_record();

      $this->load->view('View_Rs_Advent/V_All_Tables.php', $data);
    }

    public function proses_pemesanan()
    {
      if (isset($_POST['Pesan_Paket'])) {

          if ($_POST['Nama'] == "" || isset($_POST['Jenis_Kelamin']) == "" || $_POST['Alamat'] == ""
          || $_POST['No_Telepon'] == "" || isset($_POST['Paket']) == "" || $_POST['Jumlah_Pemesanan'] == "") {
            $error['error'] = 'Maaf, semua data harus diisi.';
            $this->load->view('View_Rs_Advent/V_Pemesanan.php', $error);
          }else {

            if ($_POST['Jumlah_Pemesanan'] < 1) {
              $error['error'] = 'Maaf, jumlah pemesanan minimal adalah 1';
              $this->load->view('View_Rs_Advent/V_Pemesanan.php', $error);
            }else{

              if ($_POST['Jumlah_Pemesanan'] > 8) {
                $error['error'] = 'Maaf, jumlah pemesanan maksimal adalah 8';
                $this->load->view('View_Rs_Advent/V_Pemesanan.php', $error);
              }else{

                $this->load->model('Model_Rs_Advent/M_Pemesanan');
                $error['error_mysql'] = $this->M_Pemesanan->insert_entry();

                if ($error['error_mysql'] == 'Berhasil') {
                  //$this->view_riwayat_transaksi();
                  redirect(base_url('Rs_Advent_Controller/view_riwayat_transaksi'));
                }else{
                  $this->load->view('View_Rs_Advent/V_Pemesanan.php', $error);
                }
              }
            }
          }
        }else{
          redirect(base_url('Rs_Advent_Controller/view_pemesanan'));
        }
    }
    public function view_riwayat_transaksi()
    {
      $this->load->model('Model_Rs_Advent/M_Pemesanan');
      $data['Riwayat_Transaksi'] = $this->M_Pemesanan->get_record();
      $this->load->view('View_Rs_Advent/V_Riwayat_Transaksi', $data);
    }
    public function view_pemesanan()
    {
      $this->load->view('View_Rs_Advent/V_Pemesanan.php');
    }

}
 ?>
