<?php

$page = isset($_GET['page'])
    ? $_GET['page']
    : 'home';

switch($page){

    case 'home':
        include "page/home.php";
        break;

    case 'ui-design':
        include "page/kategori/ui_design.php";
        break;

    case 'poster':
        include "page/kategori/poster.php";
        break;

    case 'photography':
        include "page/kategori/photography.php";
        break;

    case 'detail':
        include "page/detail.php";
        break;

    default:

        echo "

        <div class='container mt-5'>

            <div class='alert alert-danger'>

                Halaman Tidak Ditemukan

            </div>

        </div>

        ";

        break;
}
?>