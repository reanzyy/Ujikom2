<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

$no = 1;
$rows = query("SELECT * FROM faskes");

if (isset($_POST['submit'])) {
  if (storefaskes($_POST)) {
    header('location: ./index.php?pesan=store');
  }
}

if (isset($_GET['pesan'])) {
  $pesan = $_GET['pesan'];
  if ($pesan === 'store') {
    echo '<div class="mt-3"><div class="alert alert-success">Data Berhasil Ditambahkan!</div></div>';
  } elseif ($pesan === 'update') {
    echo '<div class="mt-3"><div class="alert alert-warning">Data Berhasil Diubah!</div></div>';
  } elseif ($pesan === 'delete') {
    echo '<div class="mt-3"><div class="alert alert-danger">Data Berhasil Dihapus!</div></div>';
  }
}
?>

<div class="px-5 py-4 mt-3 shadow" style="background-color: white;">
  <form action="" method="post">
    <div class="mb-3" style="width: 500px;">
      <label for="">Fasilitas Kesehatan</label>
      <div class="input-group">
        <input type="text" name="nama_faskes" required autocomplete="off" class="form-control">
        <button type="submit" name="submit" class="btn btn-sm btn-success">
          Simpan Data
        </button>
      </div>
    </div>
  </form>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_faskes'] ?></td>
        <td>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
            onclick="confirm('Yakin ingin menghapusnya?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
require '../../pages/layouts/bottom.php';
?>