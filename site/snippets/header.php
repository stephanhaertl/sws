<!DOCTYPE html>
<html lang="<?= $kirby->language() ? $kirby->language()->code() : 'en' ?>">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?= $page->metaTags() ?>
  <!-- Favicons -->
  <link href="dist/img/favicon.png" rel="icon">
  <link href="dist/img/apple-touch-icon.png" rel="apple-touch-icon">
  <?= $site->headerScripts()->toString() ?>
  <?= css('dist/css/style.css') ?>
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>HeroBiz<span>.</span></h1>
      </a>
      <?= snippet('navigation') ?>
      <a class="btn-getstarted scrollto" href="index.html#about">Get Started</a>
    </div>
  </header><!-- End Header -->
