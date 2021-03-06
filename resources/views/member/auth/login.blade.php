<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('cv/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('cv/css/fontawesome-all.min.css') }}" />
    <link
      rel="stylesheet"
      media="screen"
      href="https://fontlibrary.org//face/droid-arabic-kufi"
      type="text/css"
    />
    <link rel="stylesheet" href="{{ asset('cv/css/style.css') }}" />
  </head>

  <body dir="rtl">
    <!-- NavBar -->

    <nav class="navbar navbar-expand-lg navbar-light">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >الرئيسية <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">المدونة</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">تواصل معنا</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">تعرف علينا </a>
          </li>
          <li class="nav-item">
            <a class="nav-link login" href="#">سجل دخول </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="login-section position-relative">
        <img src="imgs/Group 15.png" class="h-100 position-absolute" alt="">
       <div class="container">
        <div class="login-form d-flex position-relative">
       
            <form class="submit-login" method="post">
              @csrf
                <div class="form-group position-relative">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="بريدك الإلكتروني" id="myMail">
                      @if (Session::has('error'))
                    <span class="error-mail">
                {{ Session::get('error') }}
           </span>
        @endif
                      @error('email')
                    <span class="error-mail">البريد غير مسجل</span>
            @enderror
                </div>
                <div class="form-group position-relative">
                    <input type="password" name="password" placeholder="كلمة المرور" id="myMail">
                    <i class="fas fa-eye position-absolute"></i>
                      @error('password')
                    <span class="error-mail">كلمة المرور غير صحيحة</span>
            @enderror
                </div>
                <div class="password-reset d-flex justify-content-between">
                    <div class="keep-login d-flex align-items-center">
                        <input type="checkbox" class="check"  name="rememberme" value="1"  @if(old('rememberme')) checked @endif id="checkMe">
                        <span for="checkMe">ابقني على اتصال </span>
                    </div>
                    <a href="#">استعادة كلمة المرور</a>
                </div>
                <div class="form-button text-center">
                  <button class="submit main-button d-inline-block mt-4">دخول</button>
                </div>

            </form>
        </div>
       </div>
    </section>

    <script src="{{ asset('cv/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('cv/js/popper.min.js') }}"></script>
    <script src="{{ asset('cv/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cv/js/main.js') }}"></script>
  </body>
</html>
