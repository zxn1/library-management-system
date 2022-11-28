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
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="grid">
  <header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__search">
      <input class="header__input" placeholder="Search..." />
    </div>
    <div class="header__avatar" style="background-image: url('https://d3avoj45mekucs.cloudfront.net/astrogempak/media/aplikasi/aishah_1.jpg');">
      <div class="dropdown">
        <ul class="dropdown__list">
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="far fa-user"></i></span>
            <span class="dropdown__title">my profile</span>
          </li>
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-clipboard-list"></i></span>
            <span class="dropdown__title">my account</span>
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
        <li class="navList__heading">documents<i class="far fa-file-alt"></i></li>
          <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-briefcase-medical"></i></span>
            <span class="navList__subheading-title">insurance</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">medical</li>
            <li class="subList__item">vision</li>
            <li class="subList__item">dental</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-plane-departure"></i></span>
            <span class="navList__subheading-title">travel</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">domestic</li>
            <li class="subList__item">foreign</li>
            <li class="subList__item">misc</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="far fa-angry"></i></span>
            <span class="navList__subheading-title">taxes</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">current</li>
            <li class="subList__item">archives</li>
          </ul>
        </li>

        <li class="navList__heading">messages<i class="far fa-envelope"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-envelope"></i></span>
            <span class="navList__subheading-title">inbox</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">primary</li>
            <li class="subList__item">social</li>
            <li class="subList__item">promotional</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-eye"></i></span>
            <span class="navList__subheading-title">unread</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">primary</li>
            <li class="subList__item">social</li>
            <li class="subList__item">promotional</li>
          </ul>
        </li>
         <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-book-open"></i></span>
            <span class="navList__subheading-title">archives</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">primary</li>
            <li class="subList__item">social</li>
            <li class="subList__item">promotional</li>
          </ul>
        </li>

        <li class="navList__heading">photo album<i class="far fa-image"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-mountain"></i></span>
            <span class="navList__subheading-title">vacation</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">cambodia</li>
            <li class="subList__item">new york</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-wine-glass-alt"></i></span>
            <span class="navList__subheading-title">anniversary</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">dive trip</li>
            <li class="subList__item">hikathon</li>
            <li class="subList__item">buffalo river</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-graduation-cap"></i></span>
            <span class="navList__subheading-title">university</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">wild horse saloon</li>
            <li class="subList__item">service corps</li>
            <li class="subList__item">graduation</li>
            <li class="subList__item">internships</li>
          </ul>
        </li>

        <li class="navList__heading">statistics<i class="fas fa-chart-bar"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-credit-card"></i></span>
            <span class="navList__subheading-title">finances</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">mortgage</li>
            <li class="subList__item">investments</li>
            <li class="subList__item">spend log</li>
            <li class="subList__item">owed</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-phone"></i></span>
            <span class="navList__subheading-title">call stats</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">last month</li>
            <li class="subList__item">bi-weekly</li>
            <li class="subList__item">yesterday</li>
            <li class="subList__item">today</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-plane"></i></span>
            <span class="navList__subheading-title">trip logs</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">amsterdam</li>
            <li class="subList__item">buenos aires</li>
            <li class="subList__item">cambodia</li>
            <li class="subList__item">greenland</li>
          </ul>
        </li>
        
        <li class="navList__heading">Events<i class="fas fa-calendar-alt"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-wine-glass-alt"></i></span>
            <span class="navList__subheading-title">weddings</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">past</li>
            <li class="subList__item">present</li>
            <li class="subList__item">future</li>
          </ul>
        </li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-school"></i></span>
            <span class="navList__subheading-title">playdates</span>
          </div>
          <ul class="subList subList--hidden">
            <li class="subList__item">weirdos</li>
            <li class="subList__item">smarties</li>
            <li class="subList__item">nerds</li>
          </ul>
        </li>
        <li>
              <div class="navList__subheading row row--align-v-center">
                <span class="navList__subheading-icon"><i class="fas fa-users"></i></span>
                <span class="navList__subheading-title">networking</span>
              </div>
              <ul class="subList subList--hidden">
                <li class="subList__item">tech</li>
                <li class="subList__item">automotive</li>
                <li class="subList__item">UX research</li>
                <li class="subList__item">development</li>
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
