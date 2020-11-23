<?php
   // init args
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "peminjaman_buku";

   // connect
   $conn = mysqli_connect($host, $user, $pass, $db);

   // validate
   if (!$conn) {
      echo "error -> " . mysqli_error($conn);
   }
?>