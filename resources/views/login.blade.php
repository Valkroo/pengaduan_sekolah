<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="d-flex justify-content-center min-vh-100 gap-5 align-items-center">
            <div class="card" style="width: 35rem;">
                @if (session('success'))
                <div class="d-flex justify-content-center mt-3">
                    <div class="alert alert-success alert-dismissible fade show col-lg-9" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid" width="200px">
                    </div>
                  <h3 class="card-title text-center mt-3">Silahkan Login</h3>
                  <form action="/" class="mt-2 p-3" method="POST">
                    @method('post')
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <button class="btn btn-success">Submit</button>
                        </div>
                        <p class="text-center mt-2">Tidak Punya akun? <span><a href="/register">Register</a></span></p>
                  </form>
                </div>
              </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
