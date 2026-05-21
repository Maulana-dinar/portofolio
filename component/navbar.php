<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$kategori = mysqli_query(
    $koneksi,
    "SELECT * FROM kategori"
);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">

    <div class="container">

        <a class="navbar-brand"
           href="?page=home">

            Portfolio

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"
                       href="?page=home">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="?page=ui-design">

                        UI Design

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="?page=poster">

                        Poster

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="?page=photography">

                        Photography

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>