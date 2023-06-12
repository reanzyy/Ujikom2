<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

if (isset($_POST['submit'])) {
  if (storewarga($_POST)) {
    header('location: ./index.php?pesan=store');
  }
}
?>

<div class="px-5 py-4 mt-5 shadow" style="background-color: white;">
  <form action="" method="post">
    <div class="mb-3" style="width: 500px;">
      <label for="">NIK</label>
      <input type="number" name="nik" class="form-control" required autocomplete="off">
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Tanggal Lahir</label>
      <input type="date" name="lahir" class="form-control" required>
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-sm btn-success">Simpan Data</button>
    </div>
  </form>
</div>

<?php
require '../../pages/layouts/bottom.php';
?>