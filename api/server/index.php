<?php
// menghubungi database  $connection=mysqli_connect('localhost','root','','rest_api');
$connection=mysqli_connect('localhost','root','','karyawan');

 $request_method=$_SERVER["REQUEST_METHOD"];  switch($request_method) {
   case 'GET':    // GET – mengambil informasi produk
              if(!empty($_GET["product_id"])) {     $product_id=intval($_GET["product_id"]);     get_products($product_id);
              } else {
                get_products();
              }
              break;
  case 'POST':    // POST – menambahkan produkl baru
              insert_product();
              break;

  case 'PUT':    // PUT - mengupdate produk tertentu
             $product_id=intval($_GET["product_id"]);    update_product($product_id);
             break;

  case 'DELETE':    // DELETE – menghapus produk tertentu
                $product_id=intval($_GET["product_id"]);    delete_product($product_id);
                break;
  default:    // metode request tidak valid (salah)
            header("HTTP/1.0 405 Metode Tidak Dikenali ");
            break;
  }

 function insert_product() {
   //global $connection;   $product_name=$_POST["product_name"];   $price=$_POST["price"];   $quantity=$_POST["quantity"];   $seller=$_POST["seller"];
   global $connection;   $name=$_POST["name"];   $email=$_POST["email"];   $address=$_POST["address"];   $phone=$_POST["phone"];
  $query="INSERT INTO tb_karyawan SET name='$name', email='$email', address= '$address', phone='$phone'";

  if(mysqli_query($connection, $query)) {
    $response=array(     'status' => 1,     'status_message' =>'Karyawan Berhasil Ditambahkan.'    );
  }   else {
    $response=array(     'status' => 0,     'status_message' => 'Karyawan GAGAL Ditambahkan.'    );   }

  header('Content-Type: application/json');   echo json_encode($response);
}

 function get_products($product_id=0) {
     global $connection;   $query="SELECT * FROM tb_karyawan";

  if($product_id != 0) {
    $query="SELECT * FROM tb_karyawan WHERE id=" . "'$product_id'" . "LIMIT 1";   }

  $response=array();   $result=mysqli_query($connection, $query);

  while($row=mysqli_fetch_array($result)) {
    $response[]=$row;
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}

 function delete_product($product_id=0) {
   global $connection;   $query="DELETE FROM tb_karyawan WHERE id='$product_id'";

  if(mysqli_query($connection, $query)) {
    $response=array(     'status' => 1,     'status_message' => 'Karyawan Berhasil Dihapus.'    );
  }   else {
    $response=array(     'status' => 0,     'status_message' =>' Karyawan GAGAL Dihapus '    );
  }
  header('Content-Type: application/json');   echo json_encode($response);
}

 function update_product($product_id=0) {
   global $connection;   parse_str(file_get_contents("php://input"),$post_vars);
   $name=$post_vars["name"];   $email=$post_vars["email"];   $address=$post_vars["address"];   $phone=$post_vars["phone"];

  $query =  "UPDATE tb_karyawan SET name='$name', email='$email', address='$address', phone='$phone' WHERE id= '$product_id'";

  if(mysqli_query($connection, $query)) {
    $response=array(     'status' => 1,     'status_message' =>' Karyawan Berhasil Diperbarui.'    );
  }   else {
    $response=array(     'status' => 0,     'status_message' =>' Karyawan GAGAL Diperbarui.'    );
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}
mysqli_close($connection);
 // Tutup koneksi database   mysqli_close($connection);
?>
