<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- responsive meta -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=5" />

    <!-- title -->
    <title>Pinwheel</title>

    <!-- meta-description -->
    <meta name="description" content="meta description" />

    <!-- og-title -->
    <meta property="og:title" content="" />

    <!-- og-description -->
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />

    <!-- twitter-title -->
    <meta name="twitter:title" content="" />

    <!-- twitter-description -->
    <meta name="twitter:description" content="" />

    <!-- og-image -->
    <meta property="og:image" content="" />

    <!-- twitter-image -->
    <meta name="twitter:image" content="" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- google font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=<%= fontPrimary %>&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=<%= fontSecondary %>&display=swap"
        rel="stylesheet" />

    <!-- styles -->

    <!-- Swiper slider -->
    <link rel="stylesheet" href="plugins/swiper/swiper-bundle.css" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="plugins/font-awesome/v6/brands.css" />
    <link rel="stylesheet" href="plugins/font-awesome/v6/solid.css" />
    <link rel="stylesheet" href="plugins/font-awesome/v6/fontawesome.css" />

    <!-- Main Stylesheet -->
    <link href="css/main.css" rel="stylesheet" />
</head>

<body>
    <?php


    include_once './partials/header.php';
    include_once $view_blade;
    include_once './partials/footer.php';
   



  
    ?>
</body>

</html>