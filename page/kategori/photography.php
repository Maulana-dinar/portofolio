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

     WHERE kategori.nama_kategori='Photography'

     ORDER BY karya.id_karya DESC"
);

?>

<div class="container mt-5">

    <h2 class="mb-4">
        Photography
    </h2>

    <div class="row">

        <?php while($data = mysqli_fetch_assoc($query)){ ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow border-0 h-100">

                    <img src="/portofolio_karya/image/karya/<?= $data['gambar']; ?>"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;">

                    <div class="card-body">

                        <h5>
                            <?= $data['judul_karya'] ?? ''; ?>
                        </h5>

                        <p class="text-muted mb-1">

                            <?= $data['peran'] ?? ''; ?>

                        </p>

                        <p class="text-muted">

                            <?= $data['tahun'] ?? ''; ?>

                        </p>

                        <p>
                            <?= $data['tools'] ?? ''; ?>
                        </p>

                        <a href="index.php?page=detail&id=<?= $data['id_karya']; ?>"
                           class="btn btn-success">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>