<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Pembukuan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <!-- Custom Stylesheet -->
    <link href="{{asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <p style="color: white"> Sistem Pembukuan </p>
                     </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>

                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto header-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
               
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                   
                  
                   
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class=""></i> <span class="nav-text">Barang</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/table-datasupplier">Supplier</a></li>
                            <li><a href="/table-datastockbarang">Stok Barang</a></li>
                          
                        </ul>
                    </li>
                    <li>
                        <a class="" href="/table-datapenjualan" aria-expanded="false">
                            <i class=""></i><span class="nav-text">Penjualan</span>
                        </a>
                      
                    </li>
                    <li>
                        <a class="" href="/pembelian" aria-expanded="false">
                            <i class=""></i><span class="nav-text">Pembelian</span>
                        </a>
                      
                    </li>
                    <li>
                        <a class="" href="/Kas" aria-expanded="false">
                            <i class=""></i><span class="nav-text">Kas</span>
                        </a>
                      
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembelian</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Pembelian</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id Pembelian</th>
                                                <th>Tanggal dibuat</th>
                                                <th>Tanggal diperbarui</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Supplier</th>
                                                <th>Total Harga</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pembelians as $pb): ?>
                                            <tr>
                                                <td>{{$pb->id_pembelian}}</td>
                                                <td>{{$pb->created_at}}</td>
                                                <td>{{$pb->updated_at}}</td>
                                                <td>{{$pb->barang->namabarang}}</td>
                                                <td>{{$pb->jumlah}}</td>
                                                <td>{{$pb->supplier->namasupp}}</td>
                                                <td>{{$pb->jumlah * $pb->barang->harga}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('pembeli.edit', ['id' => $pb->id_pembelian])}}">edit</a>                                
                                                     <a type="button" class="btn btn-danger" href="#" onclick="hapus(event, '{{ route('pembeli.destroy', ['pembelian' => $pb->id_pembelian]) }}')">hapus</a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 ml-auto">
                                <button onclick="window.location.href='/tambah-beli'" type="submit" class="btn btn-primary">Tambah Data Baru</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
      
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <form id="hapus" method="POST" action="" style="display:none;">
                                @csrf
                                @method('DELETE')

                                <input type="text" class="form-control" placeholder="Search">
                            </form>
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/gleek.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>

    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script type="text/javascript">
    function hapus(event, url){
        event.preventDefault();
        if (confirm('apakah anda yakin ? pastikan anda sadar'))  {
            document.getElementById('hapus').setAttribute('action',url);
             document.getElementById('hapus').submit();
        }
    }
    @if(session("pesan"))
    alert("{{session("pesan")}}")
    @endif
</script>
</body>

</html>