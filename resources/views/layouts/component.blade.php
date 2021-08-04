<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>component</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('argon') }}/assets/img/brand/favicon.png" type="image/png">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
    type="text/css">
  <!-- Iconify -->
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Custom CSS -->
  <link href="{{ asset('css/customComponent.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-6">
        <h1 class="component-title">Headings</h1>
        @yield('headings')
      </div>
    </div>

    <div class="row mt-5">
      <div class="default-button col-6">
        <h1 class="component-title">Default Buttons</h1>
        @yield('defaultButton')
      </div>
      <div class="ronded-button col-6">
        <h1 class="component-title">Rounded Buttons</h1>
        @yield('roundedButton')
      </div>
    </div>
    <div class="row mt-5">
      <div class="outline-button col-6">
        <h1 class="component-title">Outline Buttons</h1>
        @yield('outlineButton')
      </div>
      <div class="icon-button col-6">
        <h1 class="component-title">Buttons with icon</h1>
        @yield('iconButton')
      </div>
    </div>
    <div class="row mt-5">
      <div class="button-size col-6">
        <h1 class="component-title">Button Sizes</h1>
        @yield('buttonSizes')
      </div>
      <div class="button-tags col-6">
        <h1 class="component-title">Button tags</h1>
        @yield('buttonTags')
      </div>
    </div>
    <div class="row mt-5">
      <div class="block-button col-6">
        <h1 class="component-title">Block Button</h1>
        @yield('blockButton')
      </div>
      <div class="button-group col-6">
        <h1 class="component-title">Button group</h1>
        @yield('buttonGroup')
      </div>
    </div>

    {{-- DROPDOWN --}}
    <h1 class="mt-5">Dropdowns</h1>
    <div class="row">
      <div class="split-dropdown col-6">
        <h1 class="component-title">Split button dropdwons</h1>
        @yield('splitDropdowns')
      </div>
    </div>

    <div class="row mt-3">
      <div class="single-dropdown col-6">
        <h1 class="component-title">Single button dropdowns</h1>
        @yield('singleDropdowns')
      </div>
    </div>

    <div class="row mt-3">
      <div class="single-dropdown col-6">
        <h1 class="component-title">Sizing</h1>
        @yield('sizingLargeDropdown')
      </div>
      <div class="single-dropdown col-6">
        <h1 class="component-title">Sizing</h1>
        @yield('sizingSmallDropdown')
      </div>
    </div>

    {{-- PAGINATION --}}
    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Pagination</h1>
        @yield('nextprevPagination')
        @yield('nextprevIconPagination')
      </div>
      <div class="col-6">
        <h1 class="component-title">Disabled and active states</h1>
        @yield('disabled-activePagination')
        @yield('nextprev-disabledactivepagination')
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Sizing</h1>
        @yield('paginationSizing')
      </div>
      <div class="col-6">
        <h1 class="component-title">Alignment</h1>
        @yield('paginationAlignment')
      </div>
    </div>

    {{-- FORM --}}
    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Textual inputs</h1>
        @yield('formInput')
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Bootstrap Validation-Normal</h1>
        <div class="row">
          <div class="col-6">
            @yield('formValidation')
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Select</h1>
        @yield('formSelect')
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Checkboxes</h1>
        @yield('defaultCheckbox')
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-6">
        <h1 class="component-title">Radios</h1>
        @yield('radioButton')
      </div>
    </div>

    {{-- TABLE --}}
    <div class="row mt-5">
      <div class="col-10">
        <h1 class="component-title">Table</h1>
        @yield('table')
      </div>
    </div>

    {{-- CARD --}}
    <div class="row mt-5">
      <div class="col">
        <h1 class="component-title">Card</h1>
        @yield('card')
      </div>
    </div>


    <div class="row">
      <div class="col mx-auto">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="card-img-top" src="{{ url('images') }}/banner.svg" alt="">
            </div>
            <div class="carousel-item">
              <img class="card-img-top" src="{{ url('images') }}/banner.svg" alt="">
            </div>
            <div class="carousel-item">
              <img class="card-img-top" src="{{ url('images') }}/banner.svg" alt="">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{ url('argon') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="{{ url('argon') }}/assets/js/argon.js?v=1.2.0"></script>
  <script src="{{ url('js/util.js') }}"></script>
  @yield('js')
</body>

</html>