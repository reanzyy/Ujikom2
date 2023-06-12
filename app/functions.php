<?php

$conn = mysqli_connect('localhost', 'root', '', 'latihanujikom');

function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function storewarga($data)
{
  global $conn;

  $id = $data['id'];
  $nik = $data['nik'];
  $nama = $data['nama'];
  $lahir = $data['lahir'];
  $alamat = $data['alamat'];

  $query = "INSERT INTO warga VALUES('$id', '$nik', '$nama', '$lahir', '$alamat')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function updatewarga($data)
{
  global $conn;

  $id = $data['id'];
  $nik = $data['nik'];
  $nama = $data['nama'];
  $lahir = $data['lahir'];
  $alamat = $data['alamat'];

  $query = "UPDATE warga SET id = '$id', nik = '$nik', nama = '$nama', lahir = '$lahir', alamat = '$alamat' WHERE id = '$id'";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function deletewarga($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM warga WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function storekis($data)
{
  global $conn;

  $id = $data['id'];
  $id_faskes = $data['id_faskes'];
  $id_warga = $data['id_warga'];

  $query = "INSERT INTO kis VALUES('$id', '$id_faskes', '$id_warga')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function storefaskes($data)
{
  global $conn;

  $id = $data['id'];
  $nama_faskes = $data['nama_faskes'];

  $query = "INSERT INTO faskes VALUES('', '$nama_faskes')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function deletefaskes($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM faskes WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function deletekis($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM kis WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function changePassword($data)
{
  global $conn;


}