<?php

require_once $_SERVER['DOCUMENT_ROOT']
. '/portofolio_karya/config/Database.php';

$database = new Database();
$koneksi = $database->getConnection();

$queryKategori = mysqli_query(

    $koneksi,

    "SELECT * FROM kategori
     ORDER BY nama_kategori ASC"
);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container">

        <!-- logo -->
        <a class="navbar-brand fw-bold"
           href="index.php?page=home">

            Portofolio

        </a>

        <!-- toggle mobile -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- menu -->
        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <!-- home -->
                <li class="nav-item">

                    <a class="nav-link"
                       href="index.php?page=home">

                        Home

                    </a>

                </li>

                <!-- dropdown kategori -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        Kategori

                    </a>

                    <ul class="dropdown-menu">

                        <?php while($k = mysqli_fetch_assoc($queryKategori)){ ?>

                        <li>

                            <a class="dropdown-item"

                               href="index.php?page=kategori&id=<?= $k['id_kategori']; ?>">

                                <?= $k['nama_kategori']; ?>

                            </a>

                        </li>

                        <?php } ?>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>