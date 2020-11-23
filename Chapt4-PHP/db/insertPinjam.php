<?php
include("connect.php");
$id = $_GET['id'];
$result = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id) as total FROM borrowed_books WHERE id_books=$id"));
// validasi apakah sudah pernah meminjam
if (isset($_GET['pinjam']) && $result['total'] == 0){
   $return = $_GET['pengembalian'];
   $query = "INSERT INTO borrowed_books (tgl_borrow, tgl_returned, id_books) VALUES (now(), '$return', '$id')";
   if (mysqli_query($conn, $query)) {
      header("location:../pengembalian.php");
   } else {
      echo "gagal" . mysqli_error($conn);
   }
} else {
   header("location:../index.php");
}
