<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
  <div class="container">
    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="<?php echo base_url('Rs_Advent_Controller/view_dokter'); ?>">Rumah Sakit Advent</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item
        <?php
        $uri = $_SERVER['REQUEST_URI']; // Outputs: URI
        $temp = substr($uri, 36);
        if ($temp == 'view_dokter' || $temp == 'view_huni' || $temp == 'view_kamar' || $temp == 'view_obat' || $temp == 'view_pasien' || $temp == 'view_perawat' || $temp == 'view_periksa'
            || $temp == 'view_rawat' || $temp == 'view_tentukan' || $temp == 'view_all_tables' || strlen($uri) == 15) {
          echo "active";
        }
        ?>
        px-lg-4 dropdown">
          <button class="nav-link text-uppercase text-expanded btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Show Tables
            <span class="sr-only">(current)</span>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_dokter'); ?>">Dokter</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_huni'); ?>">Huni</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_kamar'); ?>">Kamar</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_obat'); ?>">Obat</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_pasien'); ?>">Pasien</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_perawat'); ?>">Perawat</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_periksa'); ?>">Periksa</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_rawat'); ?>">Rawat</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_tentukan'); ?>">Tentukan</a>
            <a class="dropdown-item" href="<?php echo base_url('Rs_Advent_Controller/view_all_tables'); ?>">Show All Tables</a>
          </div>
        </li>
        <li class="nav-item
        <?php
          if ($temp == 'view_ERD') {
            echo "active";
          }
        ?>
        px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('Rs_Advent_Controller/view_ERD'); ?>">ERD</a>
        </li>
        <li class="nav-item
        <?php
          if ($temp == 'view_pemesanan') {
            echo "active";
          }
        ?>
        px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('Rs_Advent_Controller/view_pemesanan'); ?>">Pemesanan</a>
        </li>
        <li class="nav-item
        <?php
          if ($temp == 'view_riwayat_transaksi' || $temp == 'proses_pemesanan') {
            echo "active";
          }
        ?>
        px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('Rs_Advent_Controller/view_riwayat_transaksi'); ?>">Riwayat Transaksi</a>
        </li>
        <!--
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="#">Add Record</a>
        </li>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="#">Edit Record</a>
        </li>
        -->
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('Irfan_Grayscale_Controller/view_irfan_grayscale'); ?>">About Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
/*

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo $url; // Outputs: Full URL
echo "<br><br>"; */
?>
