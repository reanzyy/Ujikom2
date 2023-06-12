<?php
require '../pages/layouts/top.php';
require '../app/functions.php';

if (isset($_POST['ubah'])) {
  $username = $_POST['username'];
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $configpass = $_POST['configpass'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$oldpass'");
  $result = mysqli_num_rows($query);

  if (!$result >= 1) {
    header('location: profile.php?pesan=fail');
  } elseif ($_POST['newpass'] != $_POST['configpass']) {
    header('location: profile.php?pesan=failconfig');
  } else {
    mysqli_query($conn, "UPDATE users SET password = '$newpass' where username = '$username'");
    header('location: profile.php?pesan=success');
  }
}


if (isset($_GET['pesan'])) {
  $pesan = $_GET['pesan'];
  if ($pesan === 'success') {
    echo '<div class="mt-4"><div class="alert alert-success">Password Berhasil Diubah!</div></div>';
  } elseif ($pesan === 'fail') {
    echo '<div class="mt-4"><div class="alert alert-danger">Password Gagal Diubah!</div></div>';
  } elseif ($pesan === 'failconfig') {
    echo '<div class="mt-4"><div class="alert alert-danger">Password dan Konfirm Password Harus Sama!</div></div>';
  }
}

?>


<div class="px-5 py-4 mt-5 shadow" style="background-color: white;">
  <form action="" method="post">
    <div class="mb-3" style="width: 500px;">
      <label for="">Username</label>
      <input type="text" name="username" class="form-control" value="<?= $_SESSION['username'] ?>" readonly>
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Password Lama</label>
      <input type="password" name="oldpass" class="form-control" required>
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Password Lama</label>
      <input type="password" name="newpass" class="form-control" required>
    </div>
    <div class="mb-3" style="width: 500px;">
      <label for="">Password Lama</label>
      <input type="password" name="configpass" class="form-control" required>
    </div>
    <div class="mb-3">
      <button type="submit" name="ubah" class="btn btn-sm btn-success">Ubah</button>
    </div>
  </form>
</div>


<?php
require '../pages/layouts/bottom.php';
?>