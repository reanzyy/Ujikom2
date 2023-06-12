<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

$id = $_GET['id'];
$rows = query("SELECT * FROM warga WHERE id = $id");
$faskes = query("SELECT * FROM faskes");

if (isset($_POST['submit'])) {
  if (storekis($_POST)) {
    header('location: ../kis/index.php?pesan=store');
  } else {
    header('location: ../kis/index.php?pesan=store');
  }
}
$id = mysqli_query($conn, "SELECT max(id) as no from kis");
$row = mysqli_fetch_assoc($id);
$no_kartu = $row['no'];
$urutan = (int) substr($no_kartu, 7, 7);
$urutan++;
$format = '2023';
$no_kartu = $format . sprintf('%06s', $urutan);

?>

<div class="px-5 py-4 mt-5 shadow" style="background-color: white;">
  <?php foreach ($rows as $row) : ?>
    <form action="" method="post">
      <div class="mb-3" style="width: 500px;">
        <label for="">ID Kartu</label>
        <input type="number" name="id" class="form-control" value="<?= $no_kartu ?>" readonly autocomplete="off">
        <input type="hidden" name="id_warga" value="<?= $row['id'] ?>">
      </div>
      <div class="mb-3" style="width: 500px;">
        <label for="">NIK</label>
        <input type="number" class="form-control" value="<?= $row['nik'] ?>" readonly autocomplete="off">
      </div>
      <div class="mb-3" style="width: 500px;">
        <label for="">Nama</label>
        <input type="text" class="form-control" value="<?= $row['nama'] ?>" readonly>
      </div>
      <div class="mb-3" style="width: 500px;">
        <label for="">Fasilitas Kesehatan</label>
        <select name="id_faskes" class="form-select">
          <?php foreach ($faskes as $row) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama_faskes'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-sm btn-success">Simpan Data</button>
      </div>
    <?php endforeach; ?>
    </form>
</div>

<?php
require '../../pages/layouts/bottom.php';
?>