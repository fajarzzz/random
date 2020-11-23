<?php
   // Connect To DB
   include("db/connect.php");

   // Header
   include("component/header.php");
?>

<!-- Main -->
<section id="main">
   <!-- Tampil Data Buku -->
   <div class="container">
      <h1 class="text-center pt-5">Daftar Buku</h1>
      <div class="card-deck pt-5">
         <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM books");
            while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
               <div class="col-md-3 col-sm-12 mb-3">
                  <div class="card">
                     <img class="card-img-top" src="<?= $data['cover'] ?>">
                     <div class="card-body">
                        <h4 class="card-title"><?= $data['judul'] ?></h4>
                        <a class="d-block btn btn-info btn-md" href="detail.php?id=<?= $data['id'] ?>">Detail</a>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>
</section>

<?php
   // Footer
   include("component/footer.php");
?>