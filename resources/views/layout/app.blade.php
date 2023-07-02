<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.0/css/fontawesome.min.css" integrity="sha512-ZXZToxNg9/jZSPmzt5qncUAk8pBQa65HSEhhqxPKGztJh5RT/fxE2Tv5xwP3e49WNkt0kMakk2NNXgIlosbBbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="row my-2">
      <div class="col-lg-12 d-flex justify-content-between align-items-center mx-auto">
        <div>
          <h2 class="text-primary">@yield('heading')</h2>
        </div>
        <div>
          <a href="@yield('link')" class="btn btn-primary rounded">@yield('link_text')</a>
        </div>

      </div>
    </div>
    <hr class="my-2">

    @yield('content')

  </div>
  {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
</body>

</html>