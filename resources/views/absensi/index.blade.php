<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website PKL/Absensi</title>
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
        <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top" id="mainNav">
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
                </div>
            </div>
        </nav>
        
        <!-- Masthead-->
        {{-- <header class="masthead">
            
        </header> --}}
        <!-- Services-->
        <section class="page-section" id="absensi" action="{{url('absensi')}}" method="POST">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="content mt-3">
                <div class="animated fadeIn">
                    <h2>Absensi <?php echo Auth::user()->name; ?></h2>
                    <form action="{{url('absen/simpan')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <select id="status" name="status" class="form-control form-control-sm" onchange="statushadir(this)" aria-label="Pilih">
                                    <option value="0">Pilih</option>
                                    <option value="1">Hadir</option>
                                    <option value="2">Izin</option>
                                    <option value="3">Sakit</option>
                                    <option value="3">Alfa</option>
                                  </select>
                            </div>
                            <div class="col-md-8">
                                <div class="row pilih">
                                    <div class="badge badge-warning">Pilih Status Kehadiran</div>
                                </div>
                                {{-- <div class="row status">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ket" id="ket1" value="Masuk">
                                            <label class="form-check-label" for="ket1">
                                              Masuk
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ket" id="ket2" value="Istirahat">
                                            <label class="form-check-label" for="ket2">
                                              Istirahat
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ket" id="ket3" value="Kembali">
                                            <label class="form-check-label" for="ket3">
                                              Kembali
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ket" id="ket4" value="Pulang">
                                            <label class="form-check-label" for="ket4">
                                              Pulang
                                            </label>
                                          </div>
                                    </div>
                                </div> --}}
                                <div class="row keterangan">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Keterangan</span>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" aria-label="Keterangan" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div id="succes"></div>
                                <div class="text-right">
                                    <button class="btn btn-info btn-sm" type="submit">Ambil Absen</button>
                                </div>    
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</th>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if ($item->status==1)
                                        Hadir
                                    @elseif ($item->status==2)
                                        Izin
                                    @elseif ($item->status==3)
                                        Sakit
                                    @elseif ($item->status==4)
                                        Alfa
                                    @else
                                        Selesai
                                    @endif
                                    {{-- {{ $item->status }} --}}
                                </td>
                                <td>{{ $item->ket }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Details
                                    </button>
                                </td>
                                {{-- <td><button type="button" class="btn btn-info" href="{{action('AbsenController@downloadPDF', $show->data)}}">
                                    Download PDF
                                </button>
                                </td> --}}

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Details Absen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Masuk</td>
                                    <td>                              
                                        <button type="submit" class="btn btn-xsm btn-light">Hadir</button>      
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>2</td>
                                    <td>Istirahat</td>
                                    <td>                              
                                        <button type="submit" class="btn btn-xsm btn-light">Hadir</button>      
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kembali</td>
                                    <td>                              
                                        <button type="button" class="btn btn-xsm btn-light">Hadir</button>      
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Pulang</td>
                                    <td>                              
                                        <button type="button" class="btn btn-xsm btn-light">Hadir</button>      
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
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
        <script>

            // $('.pilih').hide('slow')
            // $('.status').hide('slow')
            $('.keterangan').hide('slow')
            function statushadir(val){
                value = val.value
                console.log(value)
                if(value == 0){
                    $('.pilih').show('slow')
                    // $('.status').hide('slow')
                    $('.keterangan').hide('slow')
                }else if(value == 1){
                    $('.pilih').hide('slow')
                    // $('.status').show('slow')
                    $('.keterangan').hide('slow')
                }else{
                    $('.pilih').hide('slow')
                    // $('.status').hide('slow')
                    $('.keterangan').show('slow')
                }
            }
        </script>
    </body>
</html>