<?php
   // Connect To DB
   include("connect.php");

   $id = $_GET['id'];

   $query = "SELECT * FROM borrowed_books WHERE id=$id";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

   $return = $data['tgl_returned'];

   // Change the line below to your timezone!
   $now = date('Y/m/d', time());

   // change to date type
   $curdate = strtotime($now);
   $mydate = strtotime($return);

   // validasi denda
   if ($curdate < $mydate) {
      // jika tepat waktu
      $query = "DELETE FROM borrowed_books WHERE id=$id";
      if(mysqli_query($conn, $query)){
         header("location:../pengembalian.php");
      } else {
         echo mysqli_error($conn);
      }
   }else {
      $id_books = $data['id_books'];
      $validate = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id) as total FROM return_books WHERE id_books=$id_books"));
      // count Denda * hari
      $denda = ($curdate - $mydate) / (60 * 60 * 24) * 1000;
      $query = "INSERT INTO return_books (tgl_return, denda, id_books) VALUES (now(),'$denda', '$id_books')";
      if($validate['total'] == 0) {
         if(mysqli_query($conn, $query)){
            header("location:../pembayaran.php");
         }
      }else {
         header("location:../pembayaran.php");
      }
   }
