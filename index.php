<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Portfolio Karya</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet"
          href="style.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- navbar -->
    <?php include "component/navbar.php"; ?>

    <!-- hero -->
    <?php

        $page = isset($_GET['page'])
            ? $_GET['page']
            : 'home';

        if($page == 'home'){

            include "component/hero.php";
        }
    ?>

    <!-- routing -->
    <?php include "route/web.php"; ?>

    <!-- footer -->
    <?php include "component/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>