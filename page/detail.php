<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$id = $_GET['id'];

$query = mysqli_query(

    $koneksi,

    "SELECT karya.*, kategori.nama_kategori

     FROM karya

     JOIN kategori
     ON karya.id_kategori = kategori.id_kategori

     WHERE id_karya='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">

            <img src="/portofolio_karya/image/karya/<?= $data['gambar']; ?>"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

            <h2>
                <?= $data['judul_karya']; ?>
            </h2>

            <p class="text-muted">

                <?= $data['nama_kategori']; ?>

            </p>

            <p>

                <strong>Tools:</strong>

                <?= $data['tools']; ?>

            </p>

            <p>

                <?= $data['deskripsi']; ?>

            </p>

            <p>

                <strong>Peran:</strong>

                <?= $data['peran']; ?>

            </p>

            <p>

                <strong>Tahun:</strong>

                <?= $data['tahun']; ?>

            </p>

            <a href="javascript:history.back()"
                class="btn btn-secondary mb-4">

                    ← Kembali

            </a>


        </div>
        

    </div>

</div>