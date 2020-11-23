<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <style>
      * {
         box-sizing: border-box;
      }

      .main-container {
         min-height: 100vh;
         /* will cover the 100% of viewport */
         overflow: hidden;
         display: block;
         position: relative;
         padding-bottom: 100px;
         /* height of footer */
      }

      html,
      body {
         height: 100%;
         position: relative;
      }
   </style>
   <title>Peminjaman Buku</title>
</head>

<body>
   <div class="main-container">
   <!-- Header -->
   <header>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
         <div class="container">
            <a class="navbar-brand" href="index.php">OSTRIC PHP CRUD</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
               <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Peminjaman <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link" href="pengembalian.php">Pengembalian <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                     <a class="nav-link" href="pembayaran.php">Pembayaran <span class="sr-only">(current)</span></a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>