<?php
require_once 'settings.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $settings['description']; ?>">
  <meta name="author" content="<?php echo $settings['author']; ?>">

  <title><?php echo $settings['title']; ?></title>
  <base href="http://localhost/admin/index.php">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <!-- <a class="navbar-brand" href="index.html"> <img src="nedmin/dimg/settings/<?php //echo $settings['logo']; ?>" alt=""> Ma Yazılım Geliştirme</a> -->
      <a class="navbar-brand" href="index.html"><i><b><?php echo $settings['logo_text']; ?></b></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Anasayfa</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="blog">Haberler</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header>

  </header>
