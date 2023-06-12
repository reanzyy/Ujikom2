<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location: ../pages/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ujikom</title>
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/datatables/datatables.min.css">
</head>

<body class="bg-light">


  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid px-4">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="../../index.php" class="nav-link active">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="../../pages/warga/index.php" class="nav-link">Data Warga</a>
        </li>
        <li class="nav-item">
          <a href="../../pages/faskes/index.php" class="nav-link">Fasilitas Kesehatan</a>
        </li>
        <li class="nav-item">
          <a href="../../pages/kis/index.php" class="nav-link">Pengguna KIS</a>
        </li>
      </ul>
      <div class="d-flex gap-3">
        <a href="../logout.php" class="nav-link">Logout</a>
        <a href="../../pages/profile.php" class="nav-link"><?= $_SESSION['username'] ?></a>
      </div>
    </div>
  </nav>

  <div class="container">