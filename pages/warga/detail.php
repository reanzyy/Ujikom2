<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

$id = $_GET['id'];
$row = query("SELECT * FROM warga WHERE id = $id")[0];

$cek = mysqli_query($conn, "SELECT * FROM kis WHERE id_warga = $id");
?>

<div class="px-5 py-4 mt-5 shadow" style="background-color: white;">
  <div class="mb-3" style="width: 500px;">
    <label for="">NIK</label>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <input type="number" name="nik" class="form-control" value="<?= $row['nik'] ?>" disabled autocomplete="off">
  </div>
  <div class="mb-3" style="width: 500px;">
    <label for="">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" disabled>
  </div>
  <div class="mb-3" style="width: 500px;">
    <label for="">Tanggal Lahir</label>
    <input type="date" name="lahir" class="form-control" value="<?= $row['lahir'] ?>" disabled>
  </div>
  <div class="mb-3" style="width: 500px;">
    <label for="">Alamat</label>
    <textarea name="alamat" class="form-control" disabled><?= $row['alamat'] ?></textarea>
  </div>
  <?php if (mysqli_num_rows($cek) > 0) {
    echo '
      <div class="mb-3"><button disabled class="btn btn-sm btn-danger">Cetak Kartu</button></div>';
  } else {
    echo '<a href="../../pages/warga/createcard.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">Cetak Kartu</a>';
  }
  ?>
</div>

<?php
require '../../pages/layouts/bottom.php';
?>