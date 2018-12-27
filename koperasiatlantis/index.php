<?php
  //untuk membuat file SESSION baru (jika belum dibuat) dan menggunakan SESSION tersbut
  //..file SESSION tersebut, terdapat pada Server atau di Simpan pada Server
  session_start();
  //menampilkan id SESSION atau NAMA file SESSION yang sedang digunakan
  echo session_id();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/font.css">
  	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
  	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
  	<script src="assets/js/bootstrap.min.js"></script>


    <style type="text/css">
  	body {
  		color: #566787;
  		background: #f5f5f5;
  		font-family: 'Varela Round', sans-serif;
  		font-size: 13px;
  	}
  	.table-wrapper {
  		background: #fff;
  		padding: 20px 25px;
  		margin: 30px 0;
  		border-radius: 3px;
  		box-shadow: 0 1px 1px rgba(0,0,0,.05);
  	}
  	.table-title {
  		padding-bottom: 15px;
  		background: #435d7d;
  		color: #fff;
  		padding: 16px 30px;
  		margin: -20px -25px 10px;
  		border-radius: 3px 3px 0 0;
  	}
  	.table-title h2 {
  		margin: 5px 0 0;
  		font-size: 24px;
  	}
  	.table-title .btn-group {
  		float: right;
  	}
  	.table-title .btn {
  		color: #fff;
  		float: right;
  		font-size: 13px;
  		border: none;
  		min-width: 50px;
  		border-radius: 2px;
  		border: none;
  		outline: none !important;
  		margin-left: 10px;
  	}
  	.table-title .btn i {
  		float: left;
  		font-size: 21px;
  		margin-right: 5px;
  	}
  	.table-title .btn span {
  		float: left;
  		margin-top: 2px;
  	}
  	table.table tr th, table.table tr td {
  		border-color: #e9e9e9;
  		padding: 12px 15px;
  		vertical-align: middle;
  	}
  	table.table tr th:first-child {
  		width: 60px;
  	}
  	table.table tr th:last-child {
  		width: 100px;
  	}
  	table.table-striped tbody tr:nth-of-type(odd) {
  		background-color: #fcfcfc;
  	}
  	table.table-striped.table-hover tbody tr:hover {
  		background: #f5f5f5;
  	}
  	table.table th i {
  		font-size: 13px;
  		margin: 0 5px;
  		cursor: pointer;
  	}
  	table.table td:last-child i {
  		opacity: 0.9;
  		font-size: 22px;
  		margin: 0 5px;
  	}
  	table.table td a {
  		font-weight: bold;
  		color: #566787;
  		display: inline-block;
  		text-decoration: none;
  		outline: none !important;
  	}
  	table.table td a:hover {
  		color: #2196F3;
  	}
  	table.table td a.edit {
  		color: #FFC107;
  	}
  	table.table td a.delete {
  		color: #F44336;
  	}
  	table.table td i {
  		font-size: 19px;
  	}
  	table.table .avatar {
  		border-radius: 50%;
  		vertical-align: middle;
  		margin-right: 10px;
  	}
  	.pagination {
  		float: right;
  		margin: 0 0 5px;
  	}
  	.pagination li a {
  		border: none;
  		font-size: 13px;
  		min-width: 30px;
  		min-height: 30px;
  		color: #999;
  		margin: 0 2px;
  		line-height: 30px;
  		border-radius: 2px !important;
  		text-align: center;
  		padding: 0 6px;
  	}
  	.pagination li a:hover {
  		color: #666;
  	}
  	.pagination li.active a, .pagination li.active a.page-link {
  		background: #03A9F4;
  	}
  	.pagination li.active a:hover {
  		background: #0397d6;
  	}
  	.pagination li.disabled i {
  		color: #ccc;
  	}
  	.pagination li i {
  		font-size: 16px;
  		padding-top: 6px
  	}
  	.hint-text {
  		float: left;
  		margin-top: 10px;
  		font-size: 13px;
  	}
  	/* Custom checkbox */
  	.custom-checkbox {
  		position: relative;
  	}
  	.custom-checkbox input[type="checkbox"] {
  		opacity: 0;
  		position: absolute;
  		margin: 5px 0 0 3px;
  		z-index: 9;
  	}
  	.custom-checkbox label:before{
  		width: 18px;
  		height: 18px;
  	}
  	.custom-checkbox label:before {
  		content: '';
  		margin-right: 10px;
  		display: inline-block;
  		vertical-align: text-top;
  		background: white;
  		border: 1px solid #bbb;
  		border-radius: 2px;
  		box-sizing: border-box;
  		z-index: 2;
  	}
  	.custom-checkbox input[type="checkbox"]:checked + label:after {
  		content: '';
  		position: absolute;
  		left: 6px;
  		top: 3px;
  		width: 6px;
  		height: 11px;
  		border: solid #000;
  		border-width: 0 3px 3px 0;
  		transform: inherit;
  		z-index: 3;
  		transform: rotateZ(45deg);
  	}
  	.custom-checkbox input[type="checkbox"]:checked + label:before {
  		border-color: #03A9F4;
  		background: #03A9F4;
  	}
  	.custom-checkbox input[type="checkbox"]:checked + label:after {
  		border-color: #fff;
  	}
  	.custom-checkbox input[type="checkbox"]:disabled + label:before {
  		color: #b8b8b8;
  		cursor: auto;
  		box-shadow: none;
  		background: #ddd;
  	}
    .isDisabled {
      color: currentColor;
      cursor: not-allowed;
      opacity: 0.5;
      text-decoration: none;
    }

    /* Default form transaksi agar tidak terlihat */
    #tampilkan_form {
      display: none;
    }
    </style>
    <title>Koperasi Atlantis</title>
  </head>

  <body>

<?php
  //membuat koneksi  pada server localhost
  //.. dengan user =  root, password = '' atau kosong, database = 'koperasi_atlantis'
  $koneksi =  mysqli_connect('localhost', 'root', '', 'koperasi_atlantis');

  //proses memuat query yang mengambil semua data pada tabel Anggota
  //..dan mengambil hasil query tersebut ke dalam variable $hasil
  $query = "SELECT * FROM anggota";
  $hasil = mysqli_query($koneksi, $query);

  //menutup koneksi
  mysqli_close($koneksi);

  //mengubah hasil query yang terdapat pada $hasil
  //..per-1 buah record dimulai dari record baris pertama menjadi sebuah object
  //..yang kita muat pada $record,
  //..kemudian object yang terdapat pada $record kita masukkan ke dalam array $data
  //..
  while ($record = mysqli_fetch_object($hasil)) {
      $data[] = $record;
  }
?>
  <div class="container">
    <div class="table-wrapper">

      <div class="table-title">
        <div class="col-md-12">
          <h1 align="center">Anggota Koperasi Atlantis</h1>
        </div>
      </div>
      <?php
        //mengecek jika $_SESSiON['error'] sudah di definisikan
        //..maka memberi nilai return true
        if (isset($_SESSION['error'])) {

          //mengeluarkan isi data tersebut dan menampilkan error
          foreach ($_SESSION['error'] as $value) {
            echo '<h2 align="center" class="text-danger">' . $value . '</h2>';
          }
        }
      ?>
      <table class="table table-striped table-hover" style="font-size: 16px">
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>ID</th>
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Saldo</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <!-- mengecek jika record tabel anggota tidak kosong, maka tampilkan -->
            <?php if (!empty($data)): ?>
              <?php

              //mengeluarkan isi data tersebut dan menampilkan semua record tabel Anggota
              $i=1;
              foreach ($data as $value) {
                  ?>
                <td>
                  <?php echo $i; ?>
                </td>
                <td><?php echo $value->id ?></td>
                <td><?php echo $value->no_anggota; ?></td>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->alamat; ?></td>
                <td><?php echo $value->saldo; ?></td>
                <td>

                  <!-- memuat record anggota tertentu, yang akan dikirim ke javascript -->
                  <!-- menggunakan jquery .data(), dan lgsung mengarahkan layar ke
                      tabel dengan id="tabel_setor"
                  -->
                  <a id="setor" href="#tabel_setor" class="klik"
                    data-id="<?php echo  $value->id; ?>"
                    data-no_anggota="<?php echo $value->no_anggota; ?>"
                    data-nama="<?php echo $value->nama; ?>"
                    data-alamat="<?php echo $value->alamat; ?>"
                    data-keyboard="<?php echo $value->saldo; ?>">Setor
                  </a>
                </td>
              </td>
            </tr>
          <?php
            $i++;
              }
          ?>

      <!-- jika data atau record tabel anggota kosong maka tampilkan data tidak tersedia -->
      <?php else: ?>
        <tr>
          <td colspan="7" align="center"><h1>Data Tidak Tersedia</h1></td>
        </tr>
      <?php endif; ?>
      </tbody>
      </table>

      <br><br>

<script type="text/javascript">

  //Eventhandler saat Tombol Setor di-klik oleh pengguna
  //..maka akan memanggil fungsi berikut yang menampilkan sebuah Form
  $(".klik").click(function () {

    // Berikut menggunakan cara tanpa jquery atau pemanggilan DOM (Document Object Model) secara manual
    //          document.getElementById('tampilkan_form').style.display = "block";

    //Berikut menggunakan cara jquery
    $("#tampilkan_form").show();
  })
</script>

    <div id="tampilkan_form">
        <table id="tabel_setor"border="1" align="center" cellpadding="10" style="font-size: 20px" width="600">
          <tr>
            <td>No. Transaksi : </td>
            <td id="no_transaksi">
            </td>
          </tr>
          <tr>
            <td>Tanggal : </td>
            <td id="tanggal"></td>
          </tr>
          <tr>
            <td>No.<br>Anggota : </td>
            <td id="no_anggota"></td>
          </tr>
          <tr>
            <td>Nama : </td>
            <td id="nama"></td>
          </tr>
          <tr>
            <td>Alamat : </td>
            <td id="alamat"></td>
          </tr>

          <form id="form_setor" action="M_koperasi.php" method="post">
            <input id="id_input" type="hidden" name="id" value="">
            <input id="tanggal_input" type="hidden" name="tanggal" value="">
            <input id="no_anggota_input" type="hidden" name="no_anggota" value="">
            <input id="nama_input" type="hidden" name="nama" value="">
            <input id="alamat_input" type="hidden" name="alamat" value="">

            <input id="saldo_awal_input" type="hidden" name="saldo_awal" value="">

            <tr>
              <td>Saldo<br>Awal : </td>
              <td id="saldo_awal"></td>
            </tr>
            <tr>
              <td>Setoran : </td>
              <td>
                <input id="setoran" type="number" name="setoran" value="" autocomplete="off" required>
                <span id="error" style="font-size: 12px; color: red;"></span>

                <input id="saldo_akhir_input" type="hidden" name="saldo_akhir" value="">
                <input type="hidden" name="submit_alternatif" value="true">
              </td>
            </tr>
            <tr>
              <td>Saldo<br>Akhir : </td>
              <td id="saldo_akhir"></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="simpan" value="submit"></td>
          </form>
            </tr>
        </table>
    </div>

    </div>
  </div>

  <!-- Edit Modal HTML -->
  <div id="modal_setoran" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah anda sudah yakin?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" onclick="$('#form_setor').submit();">Ok</button>
          </div>
      </div>
    </div>
  </div>

    <!-- pada div berikut akan di muat script hasil dari return AJAX -->
    <div id = "script_transaksi_tambahan">

    </div>

    <script type="text/javascript">

    //berikut adalah Eventhandler pada input setoran
    //..akan mengubah saldo akhir secara otomatis
    //..dan memuat nilainya pada input saldo akhir yang bertipe hidden
    $( "#setoran" ).on( "input", function() {
      if ( $( "#setoran" ).val() < 1 ) {
        $( "#error" ).text( "Jumlah inputan harus lebih dari 0" ).show().fadeOut( 3000 );
      }else{
        var saldo_akhir =  parseInt( $( "#setoran" ).val() ) + parseInt( $( "#saldo_awal_input" ).val() )  ;
        document.getElementById("saldo_akhir").innerHTML = saldo_akhir;
        $( "#saldo_akhir_input" ).val(saldo_akhir);
      }
    });

    //berikut adalah Eventhandler pada saat melakukan submit
    //..dengan pengondisian agar nilai input setoran harus di atas 0
    //..memanggil Pop up Modal
    //..mencegah proses submit terkirim, namun melalui Pop up modal tersebut
    $( "#form_setor" ).submit(function() {
      if ( $( "#setoran" ).val() > 0) {
        if ($("#modal_setoran").modal() == false) {
          $("#modal_setoran").modal("show");
        }
      }else{
        $( "#error" ).text( "Jumlah inputan harus lebih dari 0" ).show().fadeOut( 3000 );
      }
      event.preventDefault();
    });

    //berikut Eventhandler pada setiap kali user mengklik tombol Setoran
    //..mengambil value dari atribut2 data pada tag tombol setoran tersebut
    //..mengambil nilai no_transaksi dan tanggal sekarang melalui AJAX
    //..memuat semua data tersebut pada tampilan form, termasuk pada input2 yang bertipe data hidden
    //..yang terdapat pada form tersebut
    $(document).on("click", "#setor", function() {
        var id = $(this).data('id');
        var no_anggota = $(this).data('no_anggota');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var saldo = $(this).data('keyboard');

        //mengirimkan nilai no_anggota dengan tujuan mendapatkan
        //.. nilai no_transaksi dan tanggal sekarang
        $.ajax({
             url:"M_koperasi.php",
             method:"post",
             data:{kd_anggota:no_anggota},
             success:function(data){
                  $("#script_transaksi_tambahan").html(data);
             }
        });

        //proses memuat value variable javascript ke dalam masing-masing input bertipe hidden
        //..pada from, yang memiliki nama atribut id suatu element tertentu seperti berikut
        $("#no_anggota_input").val(no_anggota);
        $("#nama_input").val(nama);
        $("#alamat_input").val(alamat);
        $("#saldo_awal_input").val(saldo);

        //proses memuat value variable javascript ke dalam element - element pada form
        //..seperti berikut
        document.getElementById("no_anggota").innerHTML = no_anggota;
        document.getElementById("nama").innerHTML = nama;
        document.getElementById("alamat").innerHTML = alamat;
        document.getElementById("saldo_awal").innerHTML = saldo;
    })
    </script>
  </body>
</html>
<?php

?>
