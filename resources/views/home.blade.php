<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>apartment</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/bootsrap_rtl.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/mydesign/css/mainstyle.css')}}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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


          </ul>
          <div></div>
          <div class=" ps-3 pe-3 d-none d-lg-block">
            <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
          </div>


        </div>

      </div>

    </nav>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{URL::asset('assets/mydesign/imgs/carousel/bed.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{URL::asset('assets/mydesign/imgs/carousel/livingroom.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{URL::asset('assets/mydesign/imgs/carousel/kitchen.jpg')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
    <div class="features text-center pt-5 pb-5">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <img class="mb-4" src="{{URL::asset('assets/mydesign/imgs/title.png')}}" alt="" />
          <h2 id="broker">بعض العروض</h2>
          <p class="text-black-50 text-uppercase">ثقه </p>
        </div>
        <div class="row">

          <div class="col-md-6 col-lg-4 ">
            <div class="feat shadow p-3 mb-5 bg-body rounded">
              <div class="icon-holder position-relative">
                <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>
                <i class="fa-solid fa-user  fa-4x  position-absolute bottom-0 icon"></i>
                <!-- <i class="fa-solid fa-pencil"></i> -->
              </div>
              <h4 class="mb-3 mt-3 text-uppercase">Good</h4>
              <p class="text-black-50 lh-lg">
                 Good afternoon
                {{-- Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed,
                convallis at tellus. --}}
              </p>
            </div>
          </div>

          </div>
        </div>
      </div>
    </div>
    <div class="our-work text-center pt-5 pb-5">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <img class="mb-4" src="{{URL::asset('assets/mydesign/imgs/title.png')}}" alt="" />
          <h2 id="apartment">بعض  </h2>
          <p class="text-black-50 text-uppercase"> ستجد ماتتمنا</p>
        </div>
        <ul class="list-unstyled d-flex justify-content-center mt-5 mb-5">
          <li class="active rounded-pill">كل</li>
          <li>مفروشه</li>
          <li>غير مفروشه</li>
          <li>تمليك</li>
          <li></li>
        </ul>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment2.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment3.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment4.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment3.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment4.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment3.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment4.jpg')}}" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box mb-3 bg-white" data-work="Application">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/apartment/apartment2.jpg')}}" alt="" />
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
          <a class="btn rounded-pill main-btn text-uppercase" href="#">أكثر</a>
        </div>
      </div>
    </div>
    <div class="stuff pt-5">
      <div class="container">
        <div class="main-title text-center mt-5 mb-5 position-relative">
          <img class="mb-4" src="{{URL::asset('assets/mydesign/imgs/title.png')}}" alt="" />
          <h2>Some Stuff About Us</h2>
          <p class="text-black-50 text-uppercase">The Great Team</p>
        </div>
        <p class="description text-center mb-5 text-black-50 m-auto">
          Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
          Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie malesuada.
        </p>
        <div class="row align-items-center">
          <div class="col-lg-4 mb-4 text-center text-md-start">
            <div class="text">
              <h4>Retina Design</h4>
              <p class="text-black-50 fs-6">
                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget
                tincidunt nibh pulvinar a.
              </p>
              <p class="text-black-50 fs-6">
                Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie
                malesuada.
              </p>
              <a class="btn rounded-pill main-btn text-uppercase" href="#">Order Me One</a>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="image">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/laptop.png')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team text-center pb-5 pt-5">
      <div class="container pb-5 pt-5">
        <h2 class="fw-bold">المطور</h2>
        <p class="text-black-50 mb-5">
          Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
          Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie malesuada.
        </p>
        <div class="row d-flex justify-content-center">

          <div class="col-md-6 col-lg-3  ">
            <div class="box bg-white">
              <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/profile.png')}}" alt="" />
              <h4 class="p-3 text-light">Al-Hamzah Al-Hagi</h4>
              <blockquote class="text-black-50 p-3">
                “ Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente, eligendi.“
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="techs pt-5 pb-5 text-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-1.png')}}" alt="" />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-2.png')}}" alt="" />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-3.png')}}" alt="" />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-4.png')}}" alt="" />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-1.png')}}" alt="" />
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2 mt-3 mb-3">
            <img class="img-fluid" src="{{URL::asset('assets/mydesign/imgs/tech-2.png')}}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="project text-center pt-5 pb-5 text-light">
      <h2>سوق لشقتك</h2>
      <p class="text-white-50">Leave your description and we start the engine.Don't worry,you can cancel anytime</p>
      <div class="d-flex justify-content-center mt-5 mb-5">
        <a class="btn rounded-pill main-btn text-uppercase" href="#">Start Project</a>
      </div>
    </div>
    <div class="blog pt-5 pb-5">
      <div class="container">
        <div class="main-title text-center mt-5 mb-5 position-relative">
          <img class="mb-2" src="{{URL::asset('assets/mydesign/imgs/title.png')}}" alt="" />
          <h2 id="about">من نحن</h2>
          <p class="text-uppercase text-black-50">قصص جديده</p>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="{{URL::asset('assets/mydesign/imgs/blog-1.jpg')}}" class="card-img-top" alt="Blog Post" />
              <div class="card-body">
                <span class="text-black-50">Jan 17, 2022</span>
                <h5 class="card-title">Some Awesome Blog Title Here</h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="{{URL::asset('assets/mydesign/imgs/blog-2.jpg')}}" class="card-img-top" alt="Blog Post" />
              <div class="card-body">
                <span class="text-black-50">Jan 17, 2022</span>
                <h5 class="card-title">Some Awesome Blog Title Here</h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="{{URL::asset('assets/mydesign/imgs/blog-3.jpg" class="card-img-top')}}" alt="Blog Post" />
              <div class="card-body">
                <span class="text-black-50">Jan 17, 2022</span>
                <h5 class="card-title">Some Awesome Blog Title Here</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-5 mb-5">
          <a class="btn rounded-pill main-btn text-uppercase" href="#">قصص أكثر</a>
        </div>
      </div>
    </div>
    <div class="subscribe pt-5 pb-5 text-center text-md-start">
      <div class="container">
        <form class="row align-items-center">
          <div class="col-md-6 col-lg-3">
            <div class="fw-bold fs-5 mb-3" id ="conect">انظم الينا:</div>
          </div>
          <div class="col-md-6 col-lg-7 mb-3">
            <input class="w-100 text-light p-2 bg-transparent" type="text" placeholder="أدخل ايميلك" />
          </div>
          <div class="col-md-6 col-lg-2">
            <input class="btn rounded-pill" type="submit" value="Subscribe" />
          </div>
        </form>
      </div>
    </div>
    <div class="footer pt-5 pb-5 text-white-50 text-center text-md-start">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="info mb-5">
              <img src="{{URL::asset('assets/mydesign/imgs/logo.png')}}" width="100px" height="60px" alt="" class="mb-4" />
              <p class="mb-5">
                Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed,
                convallis at tellus.
              </p>
              <div class="copyright">
                Created By <span>Al-Hamzah Al-Hagi</span>
                <div>&copy; 2022 - <span>Inc</span></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="links">
              <h5 class="text-light">روابط</h5>
              <ul class="list-unstyled lh-lg">
                <li>Home</li>
                <li>Our Services</li>
                <li>Portfolio</li>
                <li>Testimonials</li>
                <li>Support</li>
                <li>Terms and Condition</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="links">
              <h5 class="text-light">من نحن</h5>
              <ul class="list-unstyled lh-lg">
                <li>Sign In</li>
                <li>Register</li>
                <li>About Us</li>
                <li>Blog</li>
                <li>Contact Us</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ">
            <div class="contact">
              <h5 class="text-light">توصل معنا</h5>
              <p class="lh-lg mt-3 mb-5">Get in touch with us via mail phone.We are waiting for your call or message</p>
              <a class="btn rounded-pill main-btn w-100" href="#">youremail@gmail.com</a>
              <ul class="d-flex mt-5 list-unstyled gap-3">
                <li>
                  <a class="d-block text-light" href="#"
                    ><i class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i
                  ></a>
                </li>
                <li>
                  <a class="d-block text-light" href="#"
                    ><i class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"></i
                  ></a>
                </li>
                <li>
                  <a class="d-block text-light" href="#"
                    ><i class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"></i
                  ></a>
                </li>
                <li>
                  <a class="d-block text-light" href="#"
                    ><i class="fa-brands fa-youtube fa-lg youtube rounded-circle p-2"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{URL::asset('assets/mydesign/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/mydesign/js/all.min.js')}}"></script>
  </body>
</html>
