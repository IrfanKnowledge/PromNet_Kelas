<?php
// menghubungi database  $connection=mysqli_connect('localhost','root','','rest_api');
$connection=mysqli_connect('localhost', 'root', '', 'karyawan');

 $request_method=$_SERVER["REQUEST_METHOD"]; switch ($request_method) {
   case 'GET':    // GET – mengambil informasi semua karyawan atau karyawan tertentu
              if (!empty($_GET["id"])) {
                  $id=intval($_GET["id"]);
                  get_products($id);
              } else {
                  get_products();
              }
              break;
  case 'POST':    // POST – menambahkan karyawan baru
                  insert_product();
              break;
  case 'PUT':    // PUT - mengupdate karyawan tertentu 
             $id=intval($_GET["id"]);    update_product($id);
             break;

  case 'DELETE':    // DELETE – menghapus karyawan tertentu
                $id=intval($_GET["id"]);    delete_product($id);
                break;
  default:    // metode request tidak valid (salah)
            header("HTTP/1.0 405 Metode Tidak Dikenali ");
            break;
  }

 function insert_product()
 {
     //global $connection;   $product_name=$_POST["product_name"];   $price=$_POST["price"];   $quantity=$_POST["quantity"];   $seller=$_POST["seller"];
     global $connection;
     $name=$_POST["name"];
     $email=$_POST["email"];
     $address=$_POST["address"];
     $phone=$_POST["phone"];
     $query="INSERT INTO tb_karyawan SET name='$name', email='$email', address= '$address', phone='$phone'";

     if (mysqli_query($connection, $query)) {
         $response=array(     'status' => 1,     'status_message' =>'Karyawan Berhasil Ditambahkan.'    );
     } else {
         $response=array(     'status' => 0,     'status_message' => 'Karyawan GAGAL Ditambahkan.'    );
     }

     header('Content-Type: application/json');
     echo json_encode($response);
 }

 function get_products($id=0)
 {
     global $connection;
     $query="SELECT * FROM tb_karyawan";

     if ($id != 0) {
         $query="SELECT * FROM tb_karyawan WHERE id=" . "'$id'" . "LIMIT 1";
     }

     $response=array();
     $result=mysqli_query($connection, $query);

     while ($row=mysqli_fetch_object($result)) {
         $response[]=$row;
     }
     header('Content-Type: application/json');
     echo json_encode($response);
 }

 function delete_product($id=0)
 {
     global $connection;
     $query="DELETE FROM tb_karyawan WHERE id='$id'";

     if (mysqli_query($connection, $query)) {
         $response=array(     'status' => 1,     'status_message' => 'Karyawan Berhasil Dihapus.'    );
     } else {
         $response=array(     'status' => 0,     'status_message' =>' Karyawan GAGAL Dihapus '    );
     }
     header('Content-Type: application/json');
     echo json_encode($response);
 }

 function update_product($id=0)
 {
     global $connection;
     parse_str(file_get_contents("php://input"), $post_vars);
     $name=$post_vars["name"];
     $email=$post_vars["email"];
     $address=$post_vars["address"];
     $phone=$post_vars["phone"];

     $query =  "UPDATE tb_karyawan SET name='$name', email='$email', address='$address', phone='$phone' WHERE id= '$id'";

     if (mysqli_query($connection, $query)) {
         $response=array(     'status' => 1,     'status_message' =>' Karyawan Berhasil Diperbarui.'    );
     } else {
         $response=array(     'status' => 0,     'status_message' =>' Karyawan GAGAL Diperbarui.'    );
     }

     header('Content-Type: application/json');
     echo json_encode($response);
 }
mysqli_close($connection);
 // Tutup koneksi database   mysqli_close($connection);
