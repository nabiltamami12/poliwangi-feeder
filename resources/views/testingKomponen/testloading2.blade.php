<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>loading</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('argon') }}/assets/img/brand/favicon.png" type="image/png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link href="{{ asset('css/customComponent.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <style>
    img {
      max-width: 90vw;
      display: block;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="content">
    <img src="http://apod.nasa.gov/apod/image/0710/iapetus2_cassini_big.jpg" />
  </div>
  <div class="loaderScreen-wrapper">
    <div class="spinner-grow text-warning" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-info" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-light" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/loading.js') }}"></script>
</body>

</html>