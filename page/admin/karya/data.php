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

<div class="card shadow border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-4">

            <h4>
                Data Karya
            </h4>

            <a href="index.php?page=form-karya"
               class="btn btn-success">

                Tambah Karya

            </a>

        </div>

        <table class="table table-bordered align-middle">

            <thead class="table-light">

                <tr>

                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tools</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                while($data = mysqli_fetch_assoc($query)){
                ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td width="120">

                        <img src="/portofolio_karya/image/karya/<?= $data['gambar']; ?>"
                        width="100"
                        style="object-fit:cover; border-radius:10px;">

                    </td>

                    <td>
                        <?= $data['judul_karya']; ?>
                    </td>

                    <td>
                        <?= $data['nama_kategori']; ?>
                    </td>

                    <td>
                        <?= $data['tools']; ?>
                    </td>

                    <td width="180">

                        <a href="index.php?page=form-karya&id=<?= $data['id_karya']; ?>"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="karya/proses.php?hapus=<?= $data['id_karya']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus karya?')">

                            Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>