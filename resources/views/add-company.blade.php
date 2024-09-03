<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></head>

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
                    <a class="nav-link" aria-current="page" href="home">@lang('messages.home')</a>
                </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/companies">@lang('messages.companies')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/employees">@lang('messages.employees')</a>
              </li>

              {{-- dropdown lang --}}
              <li>
                <div class="dropdown ms-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('messages.dpdwn')
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="locale/en">English</a>
                      <a class="dropdown-item" href="locale/fr">French</a>
                    </div>
                  </div>

              </li>

            {{--  --}}
            </ul>
            <form action="{{route('logout')}}" method="post" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger me-3" type="submit">@lang('messages.logout')</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">@lang('messages.add-n-c')</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">@lang('messages.cn')</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="formGroupExampleInput" placeholder="@lang('messages.p-company')">
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">@lang('messages.email')</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="formGroupExampleInput2" placeholder="@lang('messages.p-email')">
                  @error('email')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">@lang('messages.p-up') </label>
                    <input type="file" name="logo" value="{{old('logo')}}" accept="image/*" class="form-control" id="formGroupExampleInput2">
                  @error('logo')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">@lang('messages.web')</label>
                    <input type="text" name="website" class="form-control" id="formGroupExampleInput2" placeholder="@lang('messages.p-web')">
                  @error('website')
                    <span class="text-danger">{{$message}}</span>
                  @enderror

                  <button type="submit" class="btn btn-primary mt-3">@lang('messages.save')</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
