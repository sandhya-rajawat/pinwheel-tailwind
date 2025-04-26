<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pinwheel Dashboard</title>
  <link rel="stylesheet" href="css/main.css" />
</head>

<body class="bg-gray-50 font-sans">

  <?php include_once './partials/header.php'; ?>

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md border-r">
      <?php include './partials/sidebar.php'; ?>
    </div>

    <!-- Main content -->
    <div class="flex-1 p-6">
      <?php
        if (isset($view_blade) && file_exists($view_blade)) {
          include_once $view_blade;
        } else {
          echo "<p class='text-red-500'>Page not found.</p>";
        }
      ?>
    </div>

  </div>

  <?php
    render_flash();
     $socials = getSocialLinks();
   include_once './partials/footer.php'; ?>

</body>

</html>
