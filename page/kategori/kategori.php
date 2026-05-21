<?php

require_once $_SERVER['DOCUMENT_ROOT']
. '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$id = $_GET['id'];

$queryKategori = mysqli_query(

    $koneksi,

    "SELECT * FROM kategori
     WHERE id_kategori='$id'"
);

$kategori = mysqli_fetch_assoc($queryKategori);

$query = mysqli_query(

    $koneksi,

    "SELECT * FROM karya
     WHERE id_kategori='$id'
     ORDER BY id_karya DESC"
);

?>

<div class="container mt-5">

    <h2 class="mb-4">

        <?= $kategori['nama_kategori']; ?>

    </h2>

    <div class="row">

        <?php while($data = mysqli_fetch_assoc($query)){ ?>

        <div class="col-md-4 mb-4">

            <?php include "page/karya/card.php"; ?>

        </div>

        <?php } ?>

    </div>

</div>