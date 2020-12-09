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
      <h1 class="text-center pt-5">Buku Yang Sedang Dipinjam</h1>
      <div class="card-deck pt-5">
         <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM books, borrowed_books WHERE books.id=borrowed_books.id_books ORDER BY id_books DESC");
            while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
               <div class="col-md-3 col-sm-12 mb-3">
                  <div class="card">
                     <img class="card-img-top" src="<?= $data['cover'] ?>">
                     <div class="card-body">
                        <h4 class="card-title"><?= $data['judul'] ?></h4>
                        <a class="d-block btn btn-danger btn-md" href="db/insertBayar.php?id=<?= $data['id'] ?>">Kembalikan</a>
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