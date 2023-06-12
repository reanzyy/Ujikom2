<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../assets/adminlte/css/adminlte.min.css">
</head>

<body>
  <?php
  session_start();
  require '../app/functions.php';
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) === 1) {
      $data = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $data['username'];
      header('location: ../index.php');
    } else {
      echo "<script>
      alert('Username atau Password salah!';)
      </script>";
    }
  }
  ?>

  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card">
      <h5 class="card-header">
        Login
      </h5>
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3" style="width: 300px;">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3" style="width: 300px;">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3" style="width: 300px;">
            <button type="submit" name="login" class="btn btn-sm btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>