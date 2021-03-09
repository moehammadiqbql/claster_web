<?php
require 'functions.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">

  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <title>e-Kasir App</title>

  <style>
    .navbar-brand {
      font-family: 'Viga', sans-serif;
      font-size: 32px;
      text-shadow: 0 0 3px rgb(0, 0, 0, 0.6);
      opacity: 0.9;
    }

    .nav-link {
      text-transform: uppercase;
      margin-left: 12px;
      font-size: 14px;
      color: white !important;
    }

    .nav-link:hover {
      opacity: 0.7;
    }

    .jumbotron {
      height: 500px;
      background-color: white;
    }

    .jumbotron .display-4 {
      font-size: 45px;
      margin-top: 100px;
      font-family: 'Amatic SC', cursive;
      color: white;
      opacity: 0.7;
      text-shadow: 0 2px 5px rgb(0, 0, 0, 0.6);
    }

    .jumbotron .display-4 span {
      color: yellow;
      opacity: 0.6;
      text-shadow: 6px 0px 3px rgb(0, 0, 0, 0.6);
    }

    .jumbotron p {
      font-size: 16px;
      margin-top: 10px;
      color: #acacac;
      font-style: italic;
      margin-left: 10px;
    }

    .jumbotron img {
      width: 700px;
    }

    .shop {
      margin-top: 30px;
      margin-left: 10px;
      border-radius: 10px;
    }

    .footer {
      background-color: #007BFF;
      width: 100%;
      height: 50px;
      color: white;
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">e-Kasir</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link" href="index.php">Home</a>
          <a class="nav-link" href="tambah.php">Barang</a>
          <a class="nav-link" href="transaksi.php">Transaksi</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid pb-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <h4 class="display-4">Wellcome to our <span>App</span></h4>
          <p>We will help you anything, Thanks for visited!</p>
          <a href="shop.php" class="btn btn-primary shop ">Shop now</a>
        </div>
        <div class="col-lg-4">
          <img src="img/logo/on.png" width="700px">
        </div>
      </div>

    </div>
  </div>
  <!--End Jumbotron -->


  <footer class="footer mt-5 text-center ">
    <h6 class="pt-3" style="font-style: italic;">Copyright by MuhammadIqbal. 2021</h6>
  </footer>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>