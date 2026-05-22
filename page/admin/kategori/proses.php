<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

// simpan
if(isset($_POST['simpan'])){

    $id = $_POST['id_kategori'];
    $nama = $_POST['nama_kategori'];

    // edit
    if($id){

        mysqli_query(
            $koneksi,

            "UPDATE kategori
             SET nama_kategori='$nama'
             WHERE id_kategori='$id'"
        );

    } else {

        // tambah
        mysqli_query(
            $koneksi,

            "INSERT INTO kategori(nama_kategori)
             VALUES('$nama')"
        );
    }

    header("Location: ../index.php?page=data-kategori");
    exit;
}

// hapus
if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    // cek apakah kategori masih dipakai karya
    $cek = mysqli_query(

        $koneksi,

        "SELECT * FROM karya
        WHERE id_kategori='$id'"
    );

    // jika masih ada karya
    if(mysqli_num_rows($cek) > 0){

        echo "

        <script>

            alert(
                'Kategori tidak dapat dihapus karena masih digunakan pada karya!'
            );

            window.location='../../admin/index.php?page=data-kategori';

        </script>

        ";

        exit;
    }

    // jika tidak dipakai
    mysqli_query(

        $koneksi,

        "DELETE FROM kategori
        WHERE id_kategori='$id'"
    );

    header(
        "Location: ../../admin/index.php?page=data-kategori"
    );
    exit;
}
?>