<?php
$data = $data ?? [];
?>

<div class="card karya-card shadow">

    <img src="/portofolio_karya/image/karya/<?= $data['gambar'] ?? ''; ?>">

    <div class="card-body">

        <h5>
            <?= $data['judul_karya'] ?? ''; ?>
        </h5>

        <p class="text-muted mb-1">

            <?= $data['peran'] ?? ''; ?>

        </p>

        <p class="text-muted">

            <?= $data['tahun'] ?? ''; ?>

        </p>

        <p>
            <?= $data['tools'] ?? ''; ?>
        </p>

        <a href="?page=detail&id=<?= $data['id_karya'] ?? ''; ?>"
           class="btn btn-success">

            Detail

        </a>

    </div>

</div>