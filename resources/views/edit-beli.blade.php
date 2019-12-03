<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Pembukuan</title>
    <!-- Favicon icon -->
   
    <!-- Custom Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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
                      <p style="color: white">Sistem Pembukuan</p>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pembelian</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pembelian</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('pembeli.update',['id'=> $pembeli->id_pembelian]) }}" method="post">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="">Nama Barang <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select  id="namabarang" name="barang" class="form-control">
                                                   <?php foreach ($barangs as $br): ?>
                                                        <option <?php if ($pembeli->id_barang == $br->id_barang): ?>
                                                            selected
                                                        <?php endif ?> value="{{$br->id_barang}}">{{$br->namabarang}}</option>
                                                   <?php endforeach ?>
                                                </select>
                                                 @error('barang')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="supplier">Supplier <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                 <select id="namabarang" name="supplier" class="form-control">
                                                   <?php foreach ($suppliers as $sp): ?>
                                                        <option <?php if ($pembeli->id_supplier == $br->id_supplier): ?>
                                                            selected
                                                        <?php endif ?> value="{{$sp->id_supplier}}">{{$sp->namasupp}}</option>
                                                   <?php endforeach ?>
                                                </select>
                                                 @error('supplier')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Jumlah <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" min="1" value="{{ $pembeli->jumlah }}" class="form-control" id="jumlah" name="jumlah" placeholder="isikan Jumlah ...">
                                                 @error('jumlah')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
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
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

    <script src="{{ asset('plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/validation/jquery.validate-init.js') }}"></script>

</body>

</html>