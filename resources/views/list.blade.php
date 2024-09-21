<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
 href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>Laravel Crud</title>
</head>

<body>
    <div class="bg-dark">
        <h3 class="text-white text-center">Laravel Test</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('insert')}}" class="btn btn-dark" style="margin:10px;">Add Employee</a>
                <a href="{{route('exportData')}}" class="btn btn-dark" style="margin:10px;">Export Employee Data</a>

            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>

                </div>

            @endif

        </div>
        <div class="col-md-12">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header text-center bg-dark text-white">
                    <h3>Employee Record</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center ">
                            <th>EMP ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Pancard</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        @if ($employees->isNotEmpty())
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="text-center">{{$employee->id}}</td>
                                    <td class="text-center">{{$employee->name}}</td>
                                    <td class="text-center">{{$employee->dob}}</td>
                                    <td class="text-center">{{$employee->email}}</td>
                                    <td class="text-center">{{$employee->mobile}}</td>
                                    <td class="text-center">{{$employee->pancard}}</td>
                                    <td class="text-center">
                                        @if ($employee->image != "")
                                            <img width="50" height="70" src="{{asset('upload/img/' . $employee->image)}}" alt="">

                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('modify', $employee->id)}}" class="btn btn-dark fa fa-edit"> Modify</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="status/{{$employee->id}}"
                                            class="btn btn-sm btn-{{$employee->status ? 'success' : 'danger'}}">
                                            {{$employee->status ? 'Active' : 'Inactive'}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                        <tr class="text-center">
                            <th>EMP ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Pancard</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>

                    </table>
                   
                </div>
            </div>
        </div>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

</html>