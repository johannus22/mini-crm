<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                    <a class="nav-link" aria-current="page" href="home">Home</a>
                </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/companies">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/employees">Employees</a>
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
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Add Company</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Company Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Company Name">
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Company Email">
                  @error('email')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Upload Logo (.jpg, .jpeg, .png, .gif minimum 100x100) </label>
                    <input type="file" name="logo" value="{{old('logo')}}" accept="image/*" class="form-control" id="formGroupExampleInput2">
                  @error('logo')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" id="formGroupExampleInput2" placeholder="Enter COmpany Website">
                  @error('website')
                    <span class="text-danger">{{$message}}</span>
                  @enderror

                  <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
