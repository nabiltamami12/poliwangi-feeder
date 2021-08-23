@extends('layouts.component')

@section('headings')
<h1>H1.Bootstrap heading (32.5px)</h1>
<h2>H2.Bootstrap heading (26px)</h2>
<h3>H3.Bootstrap heading (22.7501px)</h3>
<h4>H4.Bootstrap heading (19.5px)</h4>
<h5>H5.Bootstrap heading (16.2501px)</h5>
<h6>H6.Bootstrap heading (13px)</h6>
@endsection

@section('defaultButton')
<button class="btn btn-primary mt-3" type="button">Primary</button>
<button class="btn btn-secondary mt-3" type="button">Secondary</button>
<button class="btn btn-success mt-3" type="button">Success</button>
<button class="btn btn-info mt-3" type="button">Info</button>
<button class="btn btn-warning mt-3" type="button">Warning</button>
<button class="btn btn-danger mt-3" type="button">Danger</button>
<button class="btn btn-link mt-3" type="button">Link</button>
<button class="btn btn-light mt-3" type="button">Light</button>
<button class="btn btn-dark mt-3" type="button">Dark</button>
@endsection

@section('roundedButton')
<button class="btn btn-primary rounded-pill mt-3" type="button">Primary</button>
<button class="btn btn-secondary rounded-pill mt-3" type="button">Secondary</button>
<button class="btn btn-success rounded-pill mt-3" type="button">Success</button>
<button class="btn btn-info rounded-pill mt-3" type="button">Info</button>
<button class="btn btn-warning rounded-pill mt-3" type="button">Warning</button>
<button class="btn btn-danger rounded-pill mt-3" type="button">Danger</button>
<button class="btn btn-link rounded-pill mt-3" type="button">Link</button>
<button class="btn btn-light rounded-pill mt-3" type="button">Light</button>
<button class="btn btn-dark rounded-pill mt-3" type="button">Dark</button>
@endsection

@section('outlineButton')
<button type="button" class="btn btn-outline-primary mt-3">Primary</button>
<button type="button" class="btn btn-outline-secondary mt-3">Secondary</button>
<button type="button" class="btn btn-outline-success mt-3">Success</button>
<button type="button" class="btn btn-outline-info mt-3">Info</button>
<button type="button" class="btn btn-outline-warning mt-3">Warning</button>
<button type="button" class="btn btn-outline-danger mt-3">Danger</button>
<button type="button" class="btn btn-outline-light mt-3">Light</button>
<button type="button" class="btn btn-outline-dark mt-3">Dark</button>
@endsection

@section('iconButton')
<button class="btn btn-icon btn-primary mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-smile"></i></span>
  <span class="btn-inner--text">Primary</span>
</button>

<button class="btn btn-icon btn-success mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-check-double"></i></span>
  <span class="btn-inner--text">Success</span>
</button>

<button class="btn btn-icon btn-warning mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-error"></i></span>
  <span class="btn-inner--text">Warning</span>
</button>

<button class="btn btn-icon btn-danger mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-block"></i></span>
  <span class="btn-inner--text">Danger</span>
</button>

<button class="btn btn-icon btn-light mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-hourglass"></i></span>
  <span class="btn-inner--text">Loading</span>
</button>

<button class="btn btn-icon btn-dark mt-3" type="button">
  <span class="btn-inner--icon"><i class="iconify" data-icon="bx:bx-loader" data-inline="false"></i></span>
  <span class="btn-inner--text">Loading</span>
</button>
@endsection

@section('buttonSizes')
<button type="button" class="btn btn-primary btn-lg mt-3">Large button</button>
<button type="button" class="btn btn-secondary btn-lg mt-3">Large button</button>
<button type="button" class="btn btn-primary btn-sm mt-3">Small button</button>
<button type="button" class="btn btn-secondary btn-sm mt-3">Small button</button>
@endsection

@section('buttonTags')
<a class="btn btn-primary" href="#" role="button">Link</a>
<button class="btn btn-success" type="submit">Button</button>
<input class="btn btn-info" type="button" value="Input">
<input class="btn btn-danger" type="submit" value="Submit">
<input class="btn btn-warning" type="reset" value="Reset">
@endsection

@section('blockButton')
<button type="button" class="btn btn-primary btn-lg btn-block mt-3">Block level button</button>
<button type="button" class="btn btn-secondary btn-sm btn-block mt-3">Block level button</button>
@endsection

@section('buttonGroup')
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option1"> Left
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option2"> Middle
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option3"> Right
  </label>
</div>

<div class="btn-group btn-group-toggle ml-3" data-toggle="buttons">
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option1">
    <i class="iconify" data-icon="bx:bx-menu-alt-right" data-inline="false"></i>
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2">
    <i class="iconify" data-icon="bx:bx-menu" data-inline="false"></i>
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option3">
    <i class="iconify" data-icon="bx:bx-menu-alt-left" data-inline="false"></i>
  </label>
</div>
@endsection

{{-- DROPDOWN --}}

@section('splitDropdowns')
<div class="btn-group mt-3">
  <button type="button" class="btn btn-primary">Primary</button>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group mt-3">
  <button type="button" class="btn btn-secondary">Secondary</button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group mt-3">
  <button type="button" class="btn btn-success">Success</button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group mt-3">
  <button type="button" class="btn btn-info">Info</button>
  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group mt-3">
  <button type="button" class="btn btn-danger">Danger</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>

<div class="btn-group mt-3">
  <button type="button" class="btn btn-warning">Warning</button>
  <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div>
@endsection

@section('singleDropdowns')
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Dropdown button
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Dropdown link
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
@endsection

@section('sizingLargeDropdown')
<!-- Large button groups (default and split) -->
<div class="btn-group">
  <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    Large button
    <i class="iconify ml-2" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
<div class="btn-group">
  <button class="btn btn-secondary btn-lg" type="button">
    Large split button
  </button>
  <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
@endsection

@section('sizingSmallDropdown')
<!-- Small button groups (default and split) -->
<div class="btn-group">
  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    Small button
    <i class="iconify ml-2" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
<div class="btn-group">
  <button class="btn btn-secondary btn-sm" type="button">
    Small split button
  </button>
  <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="iconify" data-icon="bi:chevron-down"></i>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
@endsection

{{-- PAGINATION --}}

@section('nextprevPagination')
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a id="page-link" class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
@endsection

@section('disabled-activePagination')
<nav aria-label="disabled active states">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        <i class="iconify" data-icon="bx:bx-chevron-left" data-inline="false"></i>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        <i class="iconify" data-icon="bx:bx-chevron-right" data-inline="false"></i>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
@endsection


@section('nextprev-disabledactivepagination')
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        Previous
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        Next
      </a>
    </li>
  </ul>
</nav>
@endsection


@section('nextprevIconPagination')
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <i class="iconify" data-icon="bx:bx-chevron-left" data-inline="false"></i>
        <span class="sr-only">Previous</span>
      </a>
    </li>

    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <i class="iconify" data-icon="bx:bx-chevron-right" data-inline="false"></i>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
@endsection

@section('paginationSizing')
<nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        Previous
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        Next
      </a>
    </li>
  </ul>
</nav>


<nav aria-label="...">
  <ul class="pagination pagination-sm">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        Previous
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        Next
      </a>
    </li>
  </ul>
</nav>
@endsection

@section('paginationAlignment')
<nav aria-label="pagination align center">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        Previous
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        Next
      </a>
    </li>
  </ul>
</nav>


<nav aria-label="pagination align right">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">
        Previous
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">
        Next
      </a>
    </li>
  </ul>
</nav>
@endsection

{{-- INPUT --}}
@section('formInput')
<form>
  <div class="form-group row">
    <div class="col-sm-2">
      <label for="example-text-input" class="form-control-label">Text</label>
    </div>
    <div class="col-sm-10">
      <input class="form-control" type="text" value="John Snow" id="example-text-input">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">
      <label for="example-email-input" class="form-control-label">Email</label>
    </div>
    <div class="col-sm-10">
      <input class="form-control" type="email" value="argon@example.com" id="example-email-input">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">
      <label for="example-url-input" class="form-control-label">URL</label>
    </div>
    <div class="col-sm-10">
      <input class="form-control" type="url" value="https://www.creative-tim.com" id="example-url-input">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">
      <label for="example-password-input" class="form-control-label">Password</label>
    </div>
    <div class="col-sm-10">
      <input class="form-control" type="password" value="password" id="example-password-input">
    </div>
  </div>
</form>
@endsection

@section('formSelect')
<form>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="form-control-label">Single select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Alaska</option>
      <option>Hawaii</option>
      <option>California</option>
      <option>Nevada</option>
    </select>
  </div>
</form>

<div class="form-group">
  <label for="exampleFormControlSelect2" class="form-control-label">Multiple select</label>
  <select multiple class="form-control" id="exampleFormControlSelect2">
    <option disabled="disabled">Alaskan/Hawaiian Time Zone</option>
    <option>Alaska</option>
    <option>Hawaii</option>
    <option disabled="disabled">Pacific Time Zone</option>
    <option>California</option>
    <option>Nevada</option>
  </select>
</div>
@endsection

@section('formValidation')
<form class="was-validated">
  <div class="form-group mb-3">
    <label for="firstname" class="custom-control-label">First name</label>
    <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</form>

<form class="was-validated">
  <div class="form-group mb-3">
    <label for="lastname" class="custom-control-label">Last name</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" required>
    <div class="valid-feedback">Looks good!</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</form>
@endsection

{{-- CHECKBOX --}}
@section('defaultCheckbox')
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">Default checkbox</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
  <label class="custom-control-label" for="customCheck1">Default checkbox</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input checkbox-success" id="customCheck1" checked>
  <label class="custom-control-label" for="customCheck1">Checkbox success</label>
</div>
@endsection

@section('radioButton')
<div class="form-check default-radio">
  <input class="form-check-input" type="radio" name="exampleRadios" id="defaultRadio" value="option1" checked>
  <label class="form-check-label" for="defaultRadio">
    Default radio
  </label>
</div>

<div class="form-check default-radio">
  <input class="form-check-input radio-primary" type="radio" name="exampleRadios" id="outlinePrimaryRadio"
    value="option1" checked>
  <label class="form-check-label" for="outlinePrimaryRadio">
    Radio Outline Primary
  </label>
</div>

<div class="custom-radio">
  <input type="radio" id="customRadio1" class="radio-primary" name="customRadio" checked>
  <label for="customRadio1" class="custom-control-label">Custom Radio Primary</label>
</div>

<div class="custom-radio">
  <input type="radio" id="customRadio2" class="radio-success" name="customRadio">
  <label for="customRadio2" class="custom-control-label">Custom Radio Success</label>
</div>
@endsection


@section('table')
<div class="table-responsive">
  <div>
    <table class="table align-items-center table-hover table-borderless">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col">Nama</th>
          <th scope="col" class="text-center">Nim</th>
          <th scope="col" class="text-center">Durasi</th>
          <th scope="col" class="text-center">Jenis beasiswa</th>
          <th scope="col">Keterangan</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="list">
        <tr>
          <td class="text-center">1</td>
          <th>Jessica Charisa</th>
          <td class="text-center">4891203526</td>
          <td class="text-center">1 Semester</td>
          <td class="text-center">Beasiswa Kampus</td>
          <td>Didapatkan Pada 12/04/21</td>
          <td class="aksi text-center">
            <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
            <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
          </td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <th>Jessica Charisa</th>
          <td class="text-center">4891203526</td>
          <td class="text-center">1 Semester</td>
          <td class="text-center">Beasiswa Kampus</td>
          <td>Didapatkan Pada 12/04/21</td>
          <td class="aksi text-center">
            <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
            <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('card')
<div class="row">
  <div class="col-6">
    <div class="card shadow">
      <img class="card-img-top" src="{{ url('images') }}/banner.svg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
          card's
          content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div>
      <div class="card card-stats shadow">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
              <span class="h2 font-weight-bold mb-0">2,356</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                <i class="ni ni-chart-pie-35"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection