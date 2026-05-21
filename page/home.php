<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$query = mysqli_query(

    $koneksi,

    "SELECT karya.*, kategori.nama_kategori

     FROM karya

     JOIN kategori
     ON karya.id_kategori = kategori.id_kategori

     ORDER BY karya.id_karya DESC"
);

?>

<div class="container py-5"
        id="karya">

    <!-- heading -->
    <div class="text-center mb-5">

        <h1 class="fw-bold">
            My Portfolio
        </h1>

        <p class="text-muted">

            Kumpulan karya dan project terbaik saya

        </p>

    </div>

    <!-- card -->
    <div class="row g-4">

        <?php while($data = mysqli_fetch_assoc($query)){ ?>

            <div class="col-md-4">

                <?php include 'page/karya/card.php'; ?>

            </div>

        <?php } ?>

    </div>

</div>