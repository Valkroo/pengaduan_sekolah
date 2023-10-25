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
            <div class="bg-light p-3 rounded" style="width: 50rem;">
                <div class="d-flex gap-5 align-items-center justify-content-around">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid" width="250px">
                    </div>
                    <div class="" style="width: 30rem">
                        <form action="" class="mt-2 p-2">
                              <h3 class="card-title text-center mb-3">Silahkan daftar</h3>
                            @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="nama" name="nama" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="kelas" name="kelas" class="form-control" id="kelas">
                                </div>
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
                                <p class="text-center mt-2">Sudah Punya akun? <span><a href="/">Login</a></span></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
