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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
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
                <a class="nav-link active" aria-current="page" href="#">Companies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employees">Employees</a>
              </li>
            </ul>
            <form action="{{route('logout')}}" method="post" class="d-flex " role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger me-3" type="submit">Log Out</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                Mini CRM Project
                <a href="/add/company" class="btn btn-success btn-sm float-end">Add New Company</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%" id="table">
                            <thead>
                                <th>S/N</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th colspan="2">Actions</th>
                            </thead>
                            <tbody>
                                @if (count($companies) > 0)
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td class="d-flex justify-content-center pd-1"><img src="{{asset('storage/' . $company->logo)}}" width="50" height="50" class="img img-responsive" alt=""></td>
                                        <td>{{$company->website}}</td>
                                        <td><a href="/companies/edit/{{$company->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                                        <td><a href="/companies/delete/{{$company->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                @endforeach

                                @else
                                    <tr>
                                        <td colspan="7">No Users Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                     <div class="d-flex justify-content-center">
                    {{$companies->links()}}
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
            $('#table').DataTable();
        });
    </script>
</body>

</html>
