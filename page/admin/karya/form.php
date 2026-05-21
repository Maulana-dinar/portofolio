<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$id = $_GET['id'] ?? '';

$data = [

    'judul_karya' => '',
    'gambar' => '',
    'deskripsi' => '',
    'tools' => '',
    'peran' => '',
    'tahun' => '',
    'id_kategori' => ''
];

if($id){

    $query = mysqli_query(
        $koneksi,

        "SELECT * FROM karya
         WHERE id_karya='$id'"
    );

    $data = mysqli_fetch_assoc($query);
}

// kategori
$kategori = mysqli_query(
    $koneksi,
    "SELECT * FROM kategori"
);

?>

<div class="card shadow border-0">

    <div class="card-body">

        <h4 class="mb-4">

            <?= $id ? 'Edit' : 'Tambah'; ?>

            Karya

        </h4>

        <form action="karya/proses.php"
              method="POST"
              enctype="multipart/form-data">

            <input type="hidden"
                   name="id_karya"
                   value="<?= $id; ?>">

            <div class="mb-3">

                <label>
                    Judul Karya
                </label>

                <input type="text"
                       name="judul_karya"
                       class="form-control"
                       required
                       value="<?= $data['judul_karya'] ?? ''; ?>">

            </div>

            <div class="mb-3">

                <label>
                    Gambar
                </label>

                <input type="file"
                       name="gambar"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          required><?= $data['deskripsi'] ?? ''; ?></textarea>

            </div>

            <div class="mb-3">

                <label>
                    Tools
                </label>

                <input type="text"
                       name="tools"
                       class="form-control"
                       required
                       placeholder="Contoh: Figma, Adobe XD, VS Code"
                       value="<?= $data['tools'] ?? ''; ?>">

            </div>
            <div class="mb-3">

                <label>
                    Peran
                </label>

                <input type="text"
                    name="peran"
                    class="form-control"
                    required
                    placeholder="Contoh: UI/UX Designer"
                    value="<?= $data['peran'] ?? ''; ?>">

            </div>

            <div class="mb-3">

                <label>
                    Tahun
                </label>

                <input type="number"
                    name="tahun"
                    class="form-control"
                    required
                    placeholder="2025"
                    value="<?= $data['tahun'] ?? ''; ?>">

            </div>

            <div class="mb-3">

                <label>
                    Kategori
                </label>

                <select name="id_kategori"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    <?php while($k = mysqli_fetch_assoc($kategori)){ ?>

                    <option value="<?= $k['id_kategori']; ?>"

                        <?= $k['id_kategori'] == $data['id_kategori']
                            ? 'selected'
                            : ''; ?>>

                        <?= $k['nama_kategori']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <button type="submit"
                    name="simpan"
                    class="btn btn-success">

                Simpan

            </button>

            <a href="index.php?page=data-karya"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>