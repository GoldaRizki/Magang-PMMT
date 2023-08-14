<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="custom-design/custom-design.css" rel="stylesheet">
    @php
    if (!isset($halaman)) {
        $halaman = '';
    }    
    @endphp

    <title>PMMT @if($halaman != ''): {{$halaman}} @endif</title>
  </head>
  <body>
    <header class="navbar navbar-expand-sm navbar-dark bg-primary container-fluid sticky-top">
            <a class="navbar-brand" style="outline: none;" href="/"><div class="h3 fw-normal d-inline mx-3">PMMT<p class="d-inline header-5 fw-light">eknik</p></div></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link @if($halaman == 'Home') active @endif" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($halaman == 'Jadwal') active @endif" href="/jadwal">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($halaman == 'Alat') active @endif" href="#">Alat</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link @if($halaman == 'Spareparts') active @endif" href="#">Spareparts</a>
                </li>
               
              </ul>
            </div>
        
    </header>



        @yield('isi')




        <script src="js/bootstrap.min.js"></script>
</body>
</html>