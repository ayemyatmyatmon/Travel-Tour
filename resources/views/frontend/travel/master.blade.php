<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AMMM Travel&Tour</title>
    <link rel="shortcut icon" href="{{asset('imgs/Logo.jpg')}}" type="image">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <!-- Venobox CSS -->
    <link href="{{asset('css/venobox.css')}}" rel="stylesheet">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Flaticon -->
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,800,900" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.css"/>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Date Picker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('extra.css')
</head>

<body>
    <!--Preload-->
    <div class="preloader">
        <div class="preloader_image">
            <div class="sk-double-bounce">
                <div class="sk-child sk-double-bounce1"></div>
                <div class="sk-child sk-double-bounce2"></div>
            </div>
        </div>
    </div>
    {{-- --navbar --}}
    <div class="logonavbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container ">
                <a class="navbar-brand" href="{{route('user.home')}}">
                    {{-- <img src="{{asset('imgs/logo1.png')}}" alt="Logo" style="width:50px !important;"> --}}
                    <img src="{{asset('imgs/Logo.jpg')}}" style="width:60px !important;border-radius:100%;">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('user.home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('user.city.destination')}}">Destinations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.package')}}">Packages</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('bus')}}">Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('currency')}}">Currency Rate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('printyourticket')}}">Print Your Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('aboutus')}}">About Us</a>
                        </li>

                </ul>
            </div>
    </div>
    </nav>

    </div>
    <!-- end nav -->

    {{-- body --}}
    @yield('content')
    {{-- endbody --}}

    {{-- footer --}}
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="{{route('aboutus')}}">About Us</a></li>
                                <li><a href="{{route('user.hotel')}}">Hotels</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3>Contact Info</h3>
                            <ul>
                                <li><i class="fas fa-paper-plane" aria-hidden="true"></i> No. 209, Room 300 A, Mayangone Township, Yangon, Myanmar.</li>
                                <li><i class="fas fa-phone" aria-hidden="true"></i> +95 900XXXXX</li>
                                <li><i class="fas fa-envelope" aria-hidden="true"></i> info@example.com</li>
                                <li><i class="fas fa-fax" aria-hidden="true"></i> Fax : 02 987 978787</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3>Business hour</h3>
                            <ul class="bussiness-hour">
                                <li>Monday-Friday: <span class="pull-right">9am - 5pm.</span></li>
                                <li>Saturday: <span class="pull-right">Closed</span></li>
                                <li>Sunday: <span class="pull-right">Closed.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-sm-12 col-md-6">
                        <div class="copyright">
                            <p>Copyright &copy; 2021. All rights reserved By <i class="fas fa-heart"
                                    style="color:red;"></i>Aye Myat Myat Mon.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Bact to top -->
    <div class="back-top">
        <a href="#"><i class="fa fa-angle-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    {{-- <script src="{{asset('js/jquery.easing.min.js')}}"></script> --}}
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/venobox.min.js')}}"></script>

    {{-- <script src="{{asset('js/SmoothScroll.js')}}"></script> --}}
    <script src="{{asset('js/jquery.filterizr.min.js')}}"></script>
    <script src="{{asset('js/sticky-kit.min.js')}} "></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/fontawesome.js')}}"> </script>
    {{-- jsvalidation --}}
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.js"></script>

    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Date Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
          const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
         @if(session('create'))
                Toast.fire({
                icon: 'success',
                title: "{{session('create')}}",
                })
                @endif

    </script>
    @yield('scripts')

</body>

</html>
