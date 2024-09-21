<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel Crud</title>
</head>

<body>
    <div class="bg-dark">
        <h3 class="text-white text-center">Laravel Test</h3>
    </div>
    <div class="container">
    <div class="row justify-content-center mt-2">
            <div class="col-md-8 d-flex justify-content-end">
                <a href="{{route('index')}}" class="btn btn-dark">Back</a>

            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 ">
                <div class="card border-1 shadow-lg my-1">
                    <div class="card-header text-center bg-dark text-white">
                        <h4>Insert Record</h4>
                    </div>
                    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body ">
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee Name</label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror 
                                form-control form-control-md" placeholder="Employee Name">
                                @error('name')
                                    <p class="invallid-feedback text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee DOB</label>
                                <input type="date" name="dob" class=" @error('dob') is-invalid @enderror 
                                form-control form-control-md" placeholder="Employee DOB">
                                @error('dob')
                                    <p class="invallid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee Email</label>
                                <input type="email" name="email" class=" @error('email') is-invalid @enderror 
                                    form-control form-control-md" placeholder="Employee Email">
                                @error('email')
                                    <p class="invallid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee Mobile Number</label>
                                <input type="text" name="mobile" class=" @error('mobile') is-invalid @enderror 
                                form-control form-control-md" placeholder="Employee Mobile Number">
                                @error('mobile')
                                    <p class="invallid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee Pan Card Number</label>
                                <input type="text" name="pancard" class=" @error('pancard') is-invalid @enderror 
                                form-control form-control-md" placeholder="Employee Pan Card Number">
                                @error('pancard')
                                    <p class="invallid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">Employee Image</label>
                                <input type="file" name="image" class=" @error('image') is-invalid @enderror
                                 form-control form-control-md" placeholder="Employee Image" accept="image/*">
                                @error('image')
                                    <p class="invallid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>