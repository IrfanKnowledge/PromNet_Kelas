<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I.M.F</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('Coffe/aset/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('Coffe/css/business-casual.min.css');?>" rel="stylesheet">

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Rumah Sakit</span>
      <span class="site-heading-lower">Advent</span>
    </h1>

    <!-- Navigation -->
    <?php
      include 'Navigasi.php';
    ?>

    <!--
    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="<?php echo base_url('img/intro.jpg')?>" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Fresh Coffee</span>
              <span class="section-heading-lower">Worth Drinking</span>
            </h2>
            <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!
            </p>
            <div class="intro-button mx-auto">
              <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    -->

    <section class="pages-section cta">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-9 mx-auto" style="">
            <div class="gta-inner">
            <div class="cta-inner text-center rounded">
              <!--
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Our Promise</span>
                <span class="section-heading-lower">To You</span>
              </h2>
              <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
              -->
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Dokter</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Dokter</b></td>
                  <td><b>Nama_Dokter</b></td>
                  <td><b>Jenis_Kelamin</b></td>
                  <td><b>Spesialisasi</b></td>
                  <td><b>Alamat</b></td>
                  <td><b>No_Telepon</b></td>
                </tr>
              <?php
                  foreach ($Dokter as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Dokter; ?></td>
                  <td><?php echo $column->Nama_Dokter; ?></td>
                  <td><?php echo $column->Jenis_Kelamin; ?></td>
                  <td><?php echo $column->Spesialisasi; ?></td>
                  <td><?php echo $column->Alamat; ?></td>
                  <td><?php echo $column->No_Telepon; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Huni</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Huni</b></td>
                  <td><b>Id_Pasien</b></td>
                  <td><b>Id_Kamar</b></td>
                  <td><b>Tgl_Masuk</b></td>
                  <td><b>Tgl_Keluar</b></td>
                </tr>
              <?php
                  foreach ($Huni as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Huni; ?></td>
                  <td><?php echo $column->Id_Pasien; ?></td>
                  <td><?php echo $column->Id_Kamar; ?></td>
                  <td><?php echo $column->Tgl_Masuk; ?></td>
                  <td><?php echo $column->Tgl_Keluar; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Kamar</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Kamar</b></td>
                  <td><b>Nama_Kamar</b></td>
                  <td><b>Jenis_Kamar</b></td>
                </tr>
              <?php
                  foreach ($Kamar as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Kamar; ?></td>
                  <td><?php echo $column->Nama_Kamar; ?></td>
                  <td><?php echo $column->Jenis_Kamar; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Obat</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Obat</b></td>
                  <td><b>Nama_Obat</b></td>
                  <td><b>Jenis_Obat</b></td>
                  <td><b>Masa_Berlaku</b></td>
                </tr>
              <?php
                  foreach ($Obat as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Obat; ?></td>
                  <td><?php echo $column->Nama_Obat; ?></td>
                  <td><?php echo $column->Jenis_Obat; ?></td>
                  <td><?php echo $column->Masa_Berlaku; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Pasien</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Pasien</b></td>
                  <td><b>Nama_Pasien</b></td>
                  <td><b>Umur_Pasien</b></td>
                  <td><b>Jenis_Kelamin</b></td>
                  <td><b>Alamat</b></td>
                  <td><b>No_Telepon</b> </td>
                </tr>
              <?php
                  foreach ($Pasien as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Pasien; ?></td>
                  <td><?php echo $column->Nama_Pasien; ?></td>
                  <td><?php echo $column->Umur_Pasien; ?></td>
                  <td><?php echo $column->Jenis_Kelamin; ?></td>
                  <td><?php echo $column->Alamat; ?></td>
                  <td><?php echo $column->No_Telepon; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Perawat</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Perawat</b></td>
                  <td><b>Nama_Perawat</b></td>
                  <td><b>Jenis_Kelamin</b></td>
                  <td><b>Alamat</b></td>
                  <td><b>No_Telepon</b> </td>
                </tr>
              <?php
                  foreach ($Perawat as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Perawat; ?></td>
                  <td><?php echo $column->Nama_Perawat; ?></td>
                  <td><?php echo $column->Jenis_Kelamin; ?></td>
                  <td><?php echo $column->Alamat; ?></td>
                  <td><?php echo $column->No_Telepon; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Periksa</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Periksa</b></td>
                  <td><b>Id_Pasien</b></td>
                  <td><b>Id_Dokter</b></td>
                  <td><b>Jam_Periksa</b></td>
                </tr>
              <?php
                  foreach ($Periksa as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Periksa; ?></td>
                  <td><?php echo $column->Id_Pasien; ?></td>
                  <td><?php echo $column->Id_Dokter; ?></td>
                  <td><?php echo $column->Jam_Periksa; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Rawat</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Inap</b></td>
                  <td><b>Id_Pasien</b></td>
                  <td><b>Id_Kamar</b></td>
                  <td><b>Id_Perawat</b></td>
                  <td><b>Tanggal_Masuk</b></td>
                </tr>
              <?php
                  foreach ($Rawat as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Inap; ?></td>
                  <td><?php echo $column->Id_Pasien; ?></td>
                  <td><?php echo $column->Id_Kamar; ?></td>
                  <td><?php echo $column->Id_Perawat; ?></td>
                  <td><?php echo $column->Tanggal_masuk; ?></td>
                </tr>
              <?php } ?>
              </table>

              <br><br>
              <table cellpadding="10px" border="1px" cellspacing="0" bordercolor="black" align="center">
                <tr>
                  <td colspan="6" align="center"style="font-size: 25px;"><b>Tentukan</b></td>
                </tr>
                <tr style="font-size: 20px">
                  <td><b>Id_Tentukan</b></td>
                  <td><b>Id_Dokter</b></td>
                  <td><b>Id_Obat</b></td>
                  <td><b>Diagnosa</b></td>
                </tr>
              <?php
                  foreach ($Tentukan as $column)
                {
              ?>
                <tr>
                  <td><?php echo $column->Id_Tentukan; ?></td>
                  <td><?php echo $column->Id_Dokter; ?></td>
                  <td><?php echo $column->Id_Obat; ?></td>
                  <td><?php echo $column->Diagnosa; ?></td>
                </tr>
              <?php } ?>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; imf13.me 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('Coffe/aset/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('Coffe/aset/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  </body>

</html>
