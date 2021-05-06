<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website PKL/Nilai</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('assets/img/navbar-logo.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('peserta')}}">Peserta</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('absen' )}}">Absensi</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('nilai' )}}">Nilai</a></li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>   
        <!-- Masthead-->
        {{-- <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Website!</div>
                <div class="masthead-heading text-uppercase"></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#daftar">DAFTAR</a>
            </div>
        </header> --}}
        <!-- Services-->
        <section class="page-section" id="peserta" action="" method="POST">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="content mt-3">
                <div class="animated fadeIn">
                    <h2>Form Nilai</h2>
                    <form id="nilai" action="{{url('nilai/format')}}" method="POST" name="nilai" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nim" class="form-label">Nim</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="kampus" class="form-label">Kampus</label>
                            <input type="text" class="form-control" id="kampus" name="kampus">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama_pemb" class="form-label">Nama Pembimbing</label>
                            <input type="text" class="form-control" id="nama_pemb" name="nama_pemb">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label">Upload Format Nilai</label>
                            <input class="form-control" type="file" id="formFile" name="format">
                        </div>
                        <div class="mb-5 col-md-6 text-center">
                            <button type="submit" class="btn btn-sm btn-info">Submit</button>
                        </div>
                    </form>
                    <br> <br>
                    <h3>List Mahasiswa yang sudah mengupload Form Nilai</h3>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Jurusan</th>
                                <th>Kampus</th>
                                <th>Nama Pembimbing</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>    
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nim}}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>{{ $item->kampus }}</td>
                                    <td>{{ $item->nama_pemb }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success">View</button>
                                        <button type="button" class="btn btn-sm btn-info" >Print</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>