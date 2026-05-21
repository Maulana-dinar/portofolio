<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$karya = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM karya")
);

$kategori = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM kategori")
);

?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow border-0 p-4">

                <h5>Total Karya</h5>

                <h1>

                    <?= $karya; ?>

                </h1>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0 p-4">

                <h5>Total Kategori</h5>

                <h1>

                    <?= $kategori; ?>

                </h1>

            </div>

        </div>

    </div>

</div>