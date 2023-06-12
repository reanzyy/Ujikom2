<?php
require '../../pages/layouts/top.php';
require '../../app/functions.php';

$rows = query("SELECT kis.id, warga.nik, warga.nama, warga.lahir, warga.alamat, faskes.nama_faskes FROM kis
inner join warga on warga.id = kis.id_warga
inner join faskes on faskes.id = kis.id_faskes");

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

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Fasilitas Kesehatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['lahir'] ?></td>
        <td><?= $row['alamat'] ?></td>
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