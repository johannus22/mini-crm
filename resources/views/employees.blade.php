<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini CRM by Johannus</title>
    <!--datatables.css-->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></head>
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
                <a class="nav-link" aria-current="page" href="companies">@lang('messages.companies')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">@lang('messages.employees')</a>
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
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                @lang('messages.title-e')
                <a href="/add/employee" class="btn btn-success btn-sm float-end">@lang('messages.add-n-e')</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered" style="width:100%" id="table-employee">
                            <thead>
                                <th>S/N</th>
                                <th>@lang('messages.fn')</th>
                                <th>@lang('messages.ln')</th>
                                <th>@lang('messages.c')</th>
                                <th>@lang('messages.email')</th>
                                <th>@lang('messages.phone')</th>
                                <th colspan="2">@lang('messages.act')</th>
                            </thead>
                            <tbody>
                                @if (count($employees) > 0)
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$employee->firstname}}</td>
                                        <td>{{$employee->lastname}}</td>
                                        <td>{{$employee->company->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td><a href="/employees/edit/{{$employee->id}}" class="btn btn-primary btn-sm">@lang('messages.e')</a></td>
                                        <td><a href="/employees/delete/{{$employee->id}}" class="btn btn-danger btn-sm">@lang('messages.d')</a></td>
                                    </tr>
                                @endforeach

                                @else
                                    <tr>
                                        <td colspan="8">@lang('messages.empty')</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                        <div class="d-flex justify-content-center">
                            {{$employees->links()}}
                        </div>
                </div>
        </div>
    </div>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--datatables.js-->
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <script>
        $(document).ready( function()){
            $('#table-employee').DataTable();
        });
    </script>
</body>
</html>
