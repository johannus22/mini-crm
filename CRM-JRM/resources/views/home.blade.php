<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('storage/logos/logo-main.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top ms-1">
            Mini CRM</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="companies">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employees">Employees</a>
              </li>
            </ul>
            <form action="{{route('logout')}}" method="post" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger me-3" type="submit">Log Out</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container p-5">
        <div class="card">
            <h1 class="text-center">Welcome aboard, {{Auth::user()->name}}</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum aut aliquam porro maxime molestias voluptatum quibusdam non consequuntur, maiores corrupti mollitia necessitatibus alias cumque facilis delectus itaque? Sequi, cumque atque.</p>
        </div>

    </div>
</body>
</html>
