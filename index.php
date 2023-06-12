<?php
require './pages/layouts/top.php';
?>

<h1 class="mt-5">Hallo <?= $_SESSION['username'] ?></h1>

<?php
require './pages/layouts/bottom.php';
?>