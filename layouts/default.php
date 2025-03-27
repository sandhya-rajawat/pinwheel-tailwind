<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <link rel="shortcut icon" href="images/favicon.png" />


    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=5" />


    <title>Pinwheel</title>


    <meta name="description" content="meta description" />


    <meta property="og:title" content="" />


    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />

    <meta name="twitter:title" content="" />


    <meta name="twitter:description" content="" />


    <meta property="og:image" content="" />


    <meta name="twitter:image" content="" />
    <meta name="twitter:card" content="summary_large_image" />


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=<%= fontPrimary %>&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=<%= fontSecondary %>&display=swap"
        rel="stylesheet" />

 
    <link rel="stylesheet" href="plugins/swiper/swiper-bundle.css" />


    <link rel="stylesheet" href="plugins/font-awesome/v6/brands.css" />
    <link rel="stylesheet" href="plugins/font-awesome/v6/solid.css" />
    <link rel="stylesheet" href="plugins/font-awesome/v6/fontawesome.css" />

    <link href="css/main.css" rel="stylesheet" />
</head>

<body>
    <?php
    include_once './partials/header.php';
    render_flash();
    include_once  $view_blade;
    include_once './partials/footer.php';
  ?>
</body>

</html>