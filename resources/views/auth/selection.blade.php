<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>   لادارة الدخول</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css-rtl/section.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/bootsrap_rtl.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/mainstyle.css')}}"/>




</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top ">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{URL::asset('assets/mydesign/imgs/logo.png')}}"  width="100px;" height="60px" alt="" />
          </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#main"
            aria-controls="main"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#broker" >الاصناف</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#apartment">المنتجات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#about">عناء</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#conect">تواصل</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-3" href="{{ url('/dashboard') }}">لوحة التحكم</a>
                </li>

                <li class="nav-item">
                    @if(auth('admin')->check())
                    <form method="GET" action="{{ route('logout','admin') }}">
                        @elseif(auth('customer')->check())
                            <form method="GET" action="{{ route('logout','customer') }}">
                            @else
                            <form method="GET" action="{{ route('logout','web') }}">
                            @endif
                            @csrf
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="bx bx-log-out"></i>تسجيل الخروج</a>
                    </form>
                </li>
            </ul>
            <div></div>
            <div class=" ps-3 pe-3 d-none d-lg-block">
              <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
            </div>


          </div>

        </div>

      </nav>
    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-3" title="مستخدم عادي" href="{{route('login.show','user')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/img/user.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="عميل" href="{{route('login.show','customer')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/img/customer.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="ادمن" href="{{route('login.show','admin')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/img/admin.png')}}">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';
    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    {{-- <script src="{{ URL::asset('assets/js/custom.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
