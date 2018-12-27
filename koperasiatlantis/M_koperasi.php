<?php
  session_start();

  $koneksi = mysqli_connect("localhost", "root", "", "koperasi_atlantis");
  if (isset($_POST['kd_anggota'])) {

    function getIdTanggal($value= -1)
    {
      global $koneksi;

      $kd_anggota = $value;

      // $query = "start transaction";
      // mysqli_query($koneksi, $query);
      mysqli_begin_transaction($koneksi);

      $query = "INSERT INTO transaksi (tanggal, kd_anggota) VALUES
      ( curdate(), '$kd_anggota')";
      mysqli_query($koneksi, $query);

      $query = "SELECT id, tanggal from transaksi WHERE tanggal = curdate()";
      $hasil = mysqli_query($koneksi, $query);
      $record_array = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
      $id = $record_array[count($record_array)-1]['id'];
      $tanggal = $record_array[count($record_array)-1]['tanggal'];

      // $query = "rollback";
      // mysqli_query($koneksi, $query);
      mysqli_rollback($koneksi);
      mysqli_close($koneksi);

      // code...
      $output = '
      <script type="text/javascript">
      document.getElementById("no_transaksi").innerHTML = ';
      $output .= "'$id'" . ';';

      $output .= '
      document.getElementById("tanggal").innerHTML = ';
      $output .= "'$tanggal'" . ';';

      $output .= '
      $("#id_input").val(';
      $output .= "'$id'" .  ');';

      $output .= '
      $("#tanggal_input").val(';
      $output .= "'$tanggal'" .  ');';

      $output .= '</script>;';
      echo $output;
    }
    getIdTanggal($_POST['kd_anggota']);
  }


  if (isset($_POST['submit_alternatif'])) {
    function transaction($data= array())
    {
      global $koneksi;

      //proses mengubah semua nama key dalam array data menjadi sebuah variable
      //.. dengan nama yang sama seperti nama key
      extract($data);

      $count_error = 0;
      mysqli_begin_transaction($koneksi);
      $query = "INSERT INTO transaksi (tanggal, kd_anggota, setoran, saldo_akhir) VALUES
      ('$tanggal', '$no_anggota', '$setoran', '$saldo_akhir')";
      mysqli_query($koneksi, $query);

      if (mysqli_error($koneksi)) {
        $error[] = mysqli_error($koneksi);
        $count_error++;
      }

      $query = "UPDATE anggota SET saldo = '$saldo_akhir' WHERE no_anggota = '$no_anggota'";
      mysqli_query($koneksi, $query);

      if (mysqli_error($koneksi)) {
        $error[] = mysqli_error($koneksi);
        $count_error++;
      }

      if ($count_error > 0) {
        mysqli_rollback($koneksi);
        $_SESSION['error'] = $error;
      }else{
        mysqli_commit($koneksi);
        session_unset();
      }
      mysqli_close($koneksi);
    }
    transaction($_POST);
    echo '<meta http-equiv="refresh" content="0; URL=http://localhost/koperasiatlantis/index.php"/>';
  }
?>
