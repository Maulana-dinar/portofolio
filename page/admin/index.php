<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("Location: login.php");
    exit;
}

$page = isset($_GET['page'])
    ? $_GET['page']
    : 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../../style.css">

</head>

<body style="background:#f5f7fa;">

<div class="d-flex">

    <!-- sidebar -->
    <?php include "component/sidebar.php"; ?>

    <!-- content -->
    <div class="flex-grow-1">

        <!-- navbar -->
        <?php include "component/navbar.php"; ?>

        <!-- isi -->
        <div class="p-4">

            <?php

            switch($page){

                // dashboard
                case 'dashboard':
                    include "dashboard.php";
                    break;

                // kategori
                case 'data-kategori':
                    include "kategori/data.php";
                    break;

                case 'form-kategori':
                    include "kategori/form.php";
                    break;

                // karya
                case 'data-karya':
                    include "karya/data.php";
                    break;

                case 'form-karya':
                    include "karya/form.php";
                    break;

                // default
                default:
                    echo "

                    <div class='alert alert-danger'>

                        Halaman Tidak Ditemukan

                    </div>

                    ";
                    break;
            }

            ?>

        </div>

    </div>

</div>

</body>
</html>