<?php
require '../../app/functions.php';

$id = $_GET['id'];

if (deletekis($id) > 0) {
  header('location: index.php?pesan=delete');
} else {
  header('location: index.php?pesan=delete');
}
