<?php
// Connect To DB
include("db/connect.php");

// konfirmasi bayar
if (isset($_GET['del'])) {
   $id = $_GET['id'];
   $id_books = $_GET['id_books'];
   $query = "DELETE FROM borrowed_books WHERE id_books=$id_books;";
   $query .= "DELETE FROM return_books WHERE id=$id";
   if (mysqli_multi_query($conn, $query)) {
      header("location:pengembalian.php");
   } else {
      echo mysqli_error($conn);
   }
}
// Header
include("component/header.php");
?>

<!-- Main -->
<section id="main">
   <!-- Tampil Data Buku -->
   <div class="container">
      <h1 class="text-center pt-5">Konfirmasi Pembayaran</h1>
      <div class="card-deck pt-5">
         <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM books, return_books WHERE books.id=return_books.id_books ORDER BY id_books DESC");
            while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
               <div class="row my-3">
                  <div class="card col-md-12 p-5">
                     <div class="row">
                        <div class="col-md-6">
                           <img src="<?= $data['cover'] ?>" alt="img-buku" width="350px">
                        </div>
                        <div class="col-md-6">
                           <h2><?= $data['judul'] ?></h2>
                           <h5 class="text-muted">Oleh : <?= $data['penulis'] ?></h5>
                           <p class="font-weight-light" style="line-height:2em"><?= $data['description'] ?></p>
                           <p class="text-muted">Genre : <?= $data['genre'] ?></p>
                           <form action="" method="GET">
                              <label for="denda">Denda : <b>Rp<?= $data['denda'] ?></b></label>
                              <input type="hidden" name="id_books" value="<?= $data['id_books'] ?>">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                              <input type="submit" name="del" value="Bayar" class="mt-3 font-weight-bold w-100 btn btn-danger">
                           </form>
                        </div>
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