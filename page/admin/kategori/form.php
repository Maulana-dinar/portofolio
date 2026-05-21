<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$id = $_GET['id'] ?? '';

$data = [
    'nama_kategori' => ''
];

if($id){

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM kategori
         WHERE id_kategori='$id'"
    );

    $data = mysqli_fetch_assoc($query);
}
?>

<div class="card shadow border-0">

    <div class="card-body">

        <h4 class="mb-4">

            <?= $id ? 'Edit' : 'Tambah'; ?>

            Kategori

        </h4>

        <form action="kategori/proses.php"
              method="POST">

            <input type="hidden"
                   name="id_kategori"
                   value="<?= $id; ?>">

            <div class="mb-3">

                <label>
                    Nama Kategori
                </label>

                <input type="text"
                       name="nama_kategori"
                       class="form-control"
                       required
                       value="<?= $data['nama_kategori']; ?>">

            </div>

            <button type="submit"
                    name="simpan"
                    class="btn btn-success">

                Simpan

            </button>

            <a href="index.php?page=data-kategori"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>