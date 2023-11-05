<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <div class="d-flex p-2 navbar-brand col-md-3 col-lg-2">
        <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid" width="50px">
        <a class="navbar-brand me-0 px-3 fs-6" href="#">{{ $users->nama }}</a>
      </div>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/admin/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Home  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard/daftar-user">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
              Daftar User
            </a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="post">
              @method('post')
              @csrf
              <button class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg>
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pengaduan Anda</h1>
      </div>
      <form action="/admin/dashboard/{{ $report->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="emailHelp" value="{{ old('tanggal', $report->tanggal) }}">
        </div>
        <div class="mb-3">
          <label for="lokasi" class="form-label">Lokasi Kejadian</label>
          <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ old('lokasi', $report->lokasi) }}">
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" name="status" aria-label="Default select example" >
            <option >-->Pilih<--</option>
            <option value="belum dikonfirmasi" {{ $status == "belum dikonfirmasi" ? 'selected' : ''}}>belum dikonfirmasi</option>
            <option value="sudah dikonfirmasi" {{ $status == "sudah dikonfirmasi" ? 'selected' : ''}}>sudah dikonfirmasi</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="pesan_pengaduan" class="form-label">Pesan Pengaduan</label>
          <textarea name="pesan_pengaduan" id="pesan_pengaduan" class="form-control" rows="3">{{ old('pesan_pengaduan', $report->pesan_pengaduan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/dashboard" class="btn btn-primary">back</a>
      </form>
      
    </main>
  </div>
</div>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="{{ asset('js/dashboard.js') }}"></script>
  </body>
</html>
