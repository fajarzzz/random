<?php
// Connect To DB
include("db/connect.php");
$id = $_GET['id'];
// Header
include("component/header.php");
?>

<!-- Main -->
<section id="main">
   <!-- Tampil Data Buku -->
   <div class="container">
      <h1 class="text-center pt-5">Detail Buku</h1>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM books WHERE id='$id'");
      $data = mysqli_fetch_array($result);
      ?>
      <div class="row my-3">
         <div class="card offset-md-1 col-md-10 p-5">
            <div class="row">
               <div class="col-md-6">
                  <img src="<?= $data['cover'] ?>" alt="img-buku" width="350px">
               </div>
               <div class="col-md-6">
                  <h2><?= $data['judul'] ?></h2>
                  <h5 class="text-muted">Oleh : <?= $data['penulis'] ?></h5>
                  <p class="font-weight-light" style="line-height:2em"><?= $data['description'] ?></p>
                  <p class="text-muted">Genre : <?= $data['genre'] ?></p>
                  <form action="db/insertPinjam.php" method="GET">
                  <div class="form-group">
                     <label for="pengembalian" class="font-weight-light">Tanggal Pengembalian</label>
                        <input class="form-control" type="date" name="pengembalian" id="pengembalian" required>
                     </div>
                     <input type="hidden" name="id" value="<?= $data['id']?>">
                     <input type="submit" name="pinjam" value="Pinjam" class="mt-3 font-weight-bold w-100 btn btn-warning">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
// Footer
include("component/footer.php");
?>