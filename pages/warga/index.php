<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

$no = 1;
$rows = query("SELECT * FROM warga ORDER BY id desc");

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
  <a href="create.php" class="btn btn-sm btn-success mb-3">Tambah Data +</a>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>NO</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nik'] ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['alamat'] ?></td>
          <td>
            <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Detail</a>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin menghapusnya?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
require '../../pages/layouts/bottom.php';
?>