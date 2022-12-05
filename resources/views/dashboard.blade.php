<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Papan Pemuka</title>
  <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/resource/dash.style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555; 
        }

        .testimonial-card .card-up {
        height: 120px;
        overflow: hidden;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        }

        .testimonial-card .avatar {
        width: 110px;
        margin-top: -60px;
        overflow: hidden;
        border: 3px solid #fff;
        border-radius: 50%;
        }

        a {
            text-decoration: none !important;
            color : white !important;
        }
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="grid">
  <header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__search">
      <input class="header__input" placeholder="Pusat Sumber Sekolah" disabled/>
    </div>
    <div class="header__avatar" style="background-image: url('https://d3avoj45mekucs.cloudfront.net/astrogempak/media/aplikasi/aishah_1.jpg');">
      <div class="dropdown">
        <ul class="dropdown__list">
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="far fa-user"></i></span>
            <span class="dropdown__title">my profile</span>
          </li>
          <a href="{{route('logout')}}">
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="dropdown__title">log out</span>
          </li>
        </a>
        </ul>
      </div>
    </div>
  </header>

  <aside class="sidenav" style="overflow-x : hidden !important;">
    <div class="sidenav__brand">
      <i class="fas fa-feather-alt sidenav__brand-icon"></i>
      <a class="sidenav__brand-link" href="#">SK<span class="text-light">PA</span></a>
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <div class="sidenav__profile" style="border-radius : 13px; margin : 10px;">
      <div style="width : 100%;">

      <center>
      <img src="https://d3avoj45mekucs.cloudfront.net/astrogempak/media/aplikasi/aishah_1.jpg" class="rounded-circle mb-3" style="width: 150px; margin-top : 15px;"
        alt="Avatar" />

        <h5 class="mb-2"><strong>Cikgu Saidatul Fatini</strong></h5>
        <p class="text-muted" style="color :#f1f1f1 !important;">Pusat Sumber Sekolah <span class="badge bg-primary">PSS</span></p>
        </center>
      </div>
    </div>
    <div class="row row--align-v-center row--align-h-center">
      <ul class="navList">
        <li class="navList__heading">Maklumat Buku<i class="far fa-file-alt"></i></li>

          <li>
          <a href="{{route('dash')}}">
          <div class="ownli">
            <span class="navList__subheading-icon" style="padding-top : 15px; margin-left : 27px;">
                <span style="position : relative; top : 3px; margin-right : 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                </svg>
            </span>
            </span>
            <span class="navList__subheading-title" style="position : relative; top : -16px; margin-left : 44px;">Papan Pemuka</span>
          </div>
          </a>
          
        </li>

        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon">
                <span style="position : relative; top : 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                </span>
            </span>
            <span class="navList__subheading-title" style="position : relative; top : -10px;">Buku</span>
          </div>
          <ul class="subList subList--hidden">
            <a href="{{route('authors')}}"><li class="subList__item">Pengarang</li></a>
            <a href="{{route('lang')}}"><li class="subList__item">Bahasa</li></a>
            <a href="{{route('category')}}"><li class="subList__item">Kategori</li></a>
            <a href="{{route('bklst')}}"><li class="subList__item">Buku</li></a>
            <!--<li class="subList__item">soon..</li>-->
          </ul>
        </li>

        
        <!--<li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon">
                <i class="far fa-angry"></i>
            </span>
            <span class="navList__subheading-title">taxes</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">current</li>
            <li class="subList__item">archives</li>
          </ul>
        </li> -->

        <li class="navList__heading">Maklumat Pelajar
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg>
        </span>
        </li>
        <li>
          <a href="{{route('dash')}}">
          <div class="ownli">
            <span class="navList__subheading-icon" style="padding-top : 15px; margin-left : 27px;">
                <span style="position : relative; top : 3px; margin-right : 10px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>
              </span>
            </span>
            <span class="navList__subheading-title" style="position : relative; top : -16px; margin-left : 44px;">Pelajar</span>
          </div>
          </a>
          
        </li>

        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon">
                <span style="position : relative; top : 10px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>
                </span>
            </span>
            <span class="navList__subheading-title" style="position : relative; top : -10px;">Test</span>
          </div>
          <ul class="subList subList--hidden">
            <a href="{{route('authors')}}"><li class="subList__item">Pengarang</li></a>
            <a href="{{route('lang')}}"><li class="subList__item">Bahasa</li></a>
            <a href="{{route('category')}}"><li class="subList__item">Kategori</li></a>
            <a href="{{route('bklst')}}"><li class="subList__item">Buku</li></a>
            <!--<li class="subList__item">soon..</li>-->
          </ul>
        </li>
      </ul>
    </div>
  </aside>

  <!-- main -->
  @yield('content')
  <!-- end main --->

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> 2022 UPSI</p>
  </footer>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://www.amcharts.com/lib/3/amcharts.js'></script>
<script src='https://www.amcharts.com/lib/3/serial.js'></script>
<script src='https://www.amcharts.com/lib/3/themes/light.js'></script>
<script  src="{{asset('/resource/dash.script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
