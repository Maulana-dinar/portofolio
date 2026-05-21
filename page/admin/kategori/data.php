<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM kategori ORDER BY id_kategori DESC"
);

?>

<div class="card shadow border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-4">

            <h4>
                Data Kategori
            </h4>

            <a href="index.php?page=form-kategori"
               class="btn btn-success">

                Tambah Kategori

            </a>

        </div>

        <table class="table table-bordered align-middle">

            <thead class="table-light">

                <tr>

                    <th width="80">
                        No
                    </th>

                    <th>
                        Nama Kategori
                    </th>

                    <th width="200">
                        Aksi
                    </th>

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

                    <td>
                        <?= $data['nama_kategori']; ?>
                    </td>

                    <td>

                        <a href="index.php?page=form-kategori&id=<?= $data['id_kategori']; ?>"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="kategori/proses.php?hapus=<?= $data['id_kategori']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus kategori?')">

                            Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>