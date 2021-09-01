<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>loading</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link href="{{ asset('css/customComponent.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <style>
    .image-container {
      position: relative;
    }

    .loaderImage-wrapper {
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
</head>

<body>
  <div class="container mt-3">
    <div class="row">

      <div class="col-6 image-container">
        <div class="loaderImage-wrapper">
          <h1 class="d-inline-block text-secondary">Loading Image</h1>
          <div class="spinner-grow spinner-grow-sm text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-grow spinner-grow-sm text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-grow spinner-grow-sm text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div class="content">
          <img src="https://picsum.photos/500/500/?random" />
        </div>
      </div>

      <div class="col-6">
        <button id="getData" class="btn btn-primary">request data</button>
        <a href="/loading2" class="btn btn-danger ml-3">Click Me</a>
        <a href="/akademik/dashboard" class="btn btn-warning ml-3">akademik</a>
        <div id="loader">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div id="result"></div>
      </div>
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