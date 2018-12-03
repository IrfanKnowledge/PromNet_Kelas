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
