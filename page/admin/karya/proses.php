<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

// simpan
if(isset($_POST['simpan'])){

    $id = $_POST['id_karya'];

    $judul = $_POST['judul_karya'];
    $deskripsi = $_POST['deskripsi'];
    $tools = $_POST['tools'];
    $peran = $_POST['peran'];
    $tahun = $_POST['tahun'];
    $id_kategori = $_POST['id_kategori'];

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // jika upload gambar baru
    if($gambar){

        move_uploaded_file(
            $tmp,
            $_SERVER['DOCUMENT_ROOT'] .
            '/portofolio_karya/image/karya/' . $gambar
        );

    } else {

        // ambil gambar lama
        $old = mysqli_query(
            $koneksi,

            "SELECT gambar
             FROM karya
             WHERE id_karya='$id'"
        );

        $oldData = mysqli_fetch_assoc($old);

        $gambar = $oldData['gambar'];
    }

    // edit
    if($id){

        mysqli_query(

            $koneksi,

            "UPDATE karya SET

                judul_karya='$judul',
                gambar='$gambar',
                deskripsi='$deskripsi',
                tools='$tools',
                peran='$peran',
                tahun='$tahun',
                id_kategori='$id_kategori'

             WHERE id_karya='$id'"
        );

    } else {

        // tambah
        mysqli_query(

            $koneksi,

            "INSERT INTO karya(

                judul_karya,
                gambar,
                deskripsi,
                tools,
                peran,
                tahun,
                id_kategori

            ) VALUES(

                '$judul',
                '$gambar',
                '$deskripsi',
                '$tools',
                '$peran',
                '$tahun',
                '$id_kategori'
            )"
        );
    }

    header("Location: ../index.php?page=data-karya");
    exit;
}

// hapus
if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query(
        $koneksi,

        "DELETE FROM karya
         WHERE id_karya='$id'"
    );

    header("Location: ../index.php?page=data-karya");
    exit;
}
?>