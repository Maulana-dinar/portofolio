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

<footer class="footer-section">

    <div class="container">

        <div class="row">

            <!-- ABOUT -->
            <div class="col-md-4 mb-4">

                <h3 class="footer-logo">
                    Portfolio Karya
                </h3>

                <p class="footer-desc">
                    Website portfolio dinamis menggunakan PHP dan MySQL
                    untuk menampilkan berbagai karya kreatif dan profesional.
                </p>

            </div>

            <!-- NAVIGATION -->
            <div class="col-md-4 mb-4">

                <h5 class="footer-title">
                    Navigation
                </h5>

                <ul class="footer-menu">

                    <!-- HOME -->
                    <li>

                        <a href="index.php?page=home">

                            Home

                        </a>

                    </li>

                    <!-- KATEGORI DINAMIS -->
                    <?php while($k = mysqli_fetch_assoc($queryKategori)){ ?>

                    <li>

                        <a href="index.php?page=kategori&id=<?= $k['id_kategori']; ?>">

                            <?= $k['nama_kategori']; ?>

                        </a>

                    </li>

                    <?php } ?>

                </ul>

            </div>

            <!-- CONTACT -->
            <div class="col-md-4 mb-4">

                <h5 class="footer-title">
                    Contact
                </h5>

                <p class="footer-contact">
                    portfolio@email.com
                </p>

                <!-- SOCIAL MEDIA -->
                <div class="social-icons">

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-github"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- COPYRIGHT -->
        <div class="footer-bottom">

            <p>
                © <?= date('Y'); ?> Portfolio Karya. All Rights Reserved.
            </p>

        </div>

    </div>

</footer>