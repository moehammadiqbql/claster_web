<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Shop</title>

  <style>
    body {
      background-color: white;
    }

    .head {
      font-family: 'Dancing Script', cursive;
      font-size: 40px;
      color: white;
      text-shadow: 0 2px 3px rgb(0, 0, 0, 0.6);
    }

    .head span {
      font-size: 50px;
      color: #007BFF;
      opacity: 0.6;

    }

    .input-keyword {
      z-index: 9999;
    }

    .box {
      background-color: black;
      width: auto;
      height: 1000px;
      margin-top: -200px;
      opacity: 0.1;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4 text-center">
        <h1 class="head">Shopping<span>Yuk!</span></h1>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8 mt-2">
        <div class="input-group mb-3">
          <input type="text" class="form-control input-keyword" placeholder="Search phone..">
          <div class="input-group-append">
            <button class="btn btn-primary search-button" type="button" id="button-addon2">Search</button>
          </div>
        </div>

      </div>
    </div>

    <div class="row shop-container">

    </div>

  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>

  <script>
    $('.search-button').on('click', function() {

      $.ajax({
        url: "http://api-mobilespecs.azharimm.tk/search?query=oppo",
        success: result => {
          let phone = result.data.phones;
          console.log(phone);
          let cards = '';
          phone.forEach(m => {
            cards += `
                    <div class="col-md-3 my-3 ">
                    <div class="card" style="width: 17rem;">
                      <img src="${m.phones.phone_name}" class="card-img-top">
                      <div class="card-body">
                        <h5 class="card-title">${m.Title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">${m.Year}</h6>
                        <a href="#" class="btn btn-primary modal-detail-button" data-toggle="modal" data-target="#movieDetailModal" data-imdbid="${m.imdbID}" >Show Details</a>
                      </div>
                    </div>
                  </div>`;

            $('.shop-container').html(cards);
          })
        }
      })

    })
  </script>

</body>

</html>