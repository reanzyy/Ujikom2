<?php
require '../../app/functions.php';

$id = $_GET['id'];

if (deletefaskes($id) > 0) {
  header('location: index.php?pesan=delete');
}