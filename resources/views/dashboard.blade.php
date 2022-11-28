<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Papan Pemuka</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/resource/dash.style.css')}}">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="grid">
  <header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__search">
      <input class="header__input" placeholder="Search..." />
    </div>
    <div class="header__avatar">
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

  <aside class="sidenav">
    <div class="sidenav__brand">
      <i class="fas fa-feather-alt sidenav__brand-icon"></i>
      <a class="sidenav__brand-link" href="#">SK<span class="text-light">PA</span></a>
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <div class="sidenav__profile">
      <div class="sidenav__profile-avatar"></div>
      <div class="sidenav__profile-title text-light">Matthew H</div>
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

  <main class="main">
    <div class="main-header">
      <div class="main-header__intro-wrapper">
        <div class="main-header__welcome">
          <div class="main-header__welcome-title text-light">Welcome, <strong>Matthew</strong></div>
          <div class="main-header__welcome-subtitle text-light">How are you today?</div>
        </div>
        <div class="quickview">
          <div class="quickview__item">
            <div class="quickview__item-total">41</div>
            <div class="quickview__item-description">
              <i class="far fa-calendar-alt"></i>
              <span class="text-light">Events</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">64</div>
            <div class="quickview__item-description">
              <i class="far fa-comment"></i>
              <span class="text-light">Messages</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">27&deg;</div>
            <div class="quickview__item-description">
              <i class="fas fa-map-marker-alt"></i>
              <span class="text-light">Austin</span>
            </div>
          </div>
        </div>
      </div>

        @if (session('faillogout'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position : absolute; top : 15px; width : 80%; margin-left : 20px;">
            <strong>Error!</strong> {{ session('faillogout') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
    <div class="main-overview">
      <div class="overviewCard">
        <div class="overviewCard-icon overviewCard-icon--document">
           <i class="far fa-file-alt"></i>
        </div>
        <div class="overviewCard-description">
          <h3 class="overviewCard-title text-light">New <strong>Document</strong></h3>
          <p class="overviewCard-subtitle">Europe Trip</p>
        </div>
      </div>
      <div class="overviewCard">
        <div class="overviewCard-icon overviewCard-icon--calendar">
           <i class="far fa-calendar-check"></i>
        </div>
        <div class="overviewCard-description">
          <h3 class="overviewCard-title text-light">Upcoming <strong>Event</strong></h3>
          <p class="overviewCard-subtitle">Chili Cookoff</p>
        </div>
      </div>
      <div class="overviewCard">
        <div class="overviewCard-icon overviewCard-icon--mail">
           <i class="far fa-envelope"></i>
        </div>
        <div class="overviewCard-description">
          <h3 class="overviewCard-title text-light">Recent <strong>Emails</strong></h3>
          <p class="overviewCard-subtitle">+10</p>
        </div>
      </div>
      <div class="overviewCard">
        <div class="overviewCard-icon overviewCard-icon--photo">
           <i class="far fa-file-image"></i>
        </div>
        <div class="overviewCard-description">
          <h3 class="overviewCard-title text-light">New <strong>Album</strong></h3>
          <p class="overviewCard-subtitle">House Concert</p>
        </div>
      </div>
    </div> <!-- /.main__overview -->
    <div class="main__cards">
      <div class="card">
        <div class="card__header">
          <div class="card__header-title text-light">Your <strong>Events</strong>
            <a href="#" class="card__header-link text-bold">View All</a>
          </div>
          <div class="settings">
            <div class="settings__block"><i class="fas fa-edit"></i></div>
            <div class="settings__block"><i class="fas fa-cog"></i></div>
          </div>
        </div>
        <div class="card__main">
          <div class="card__row">
            <div class="card__icon"><i class="fas fa-gift"></i></div>
            <div class="card__time">
              <div>today</div>
            </div>
            <div class="card__detail">
              <div class="card__source text-bold">Jonathan G</div>
              <div class="card__description">Going away party at 8:30pm. Bring a friend!</div>
              <div class="card__note">1404 Gibson St</div>
            </div>
          </div>
          <div class="card__row">
            <div class="card__icon"><i class="fas fa-plane"></i></div>
            <div class="card__time">
              <div>Tuesday</div>
            </div>
            <div class="card__detail">
              <div class="card__source text-bold">Matthew H</div>
              <div class="card__description">Flying to Bora Bora at 4:30pm</div>
              <div class="card__note">Delta, Gate 27B</div>
            </div>
          </div>
          <div class="card__row">
            <div class="card__icon"><i class="fas fa-book"></i></div>
            <div class="card__time">
              <div>Thursday</div>
            </div>
            <div class="card__detail">
              <div class="card__source text-bold">National Institute of Science</div>
              <div class="card__description">Join the institute for an in-depth look at Stephen Hawking</div>
              <div class="card__note">7:30pm, Carnegie Center for Science</div>
            </div>
          </div>
          <div class="card__row">
            <div class="card__icon"><i class="fas fa-heart"></i></div>
            <div class="card__time">
              <div>Friday</div>
            </div>
            <div class="card__detail">
              <div class="card__source text-bold">24th Annual Heart Ball</div>
              <div class="card__description">Join us and contribute to your favorite local charity.</div>
              <div class="card__note">6:45pm, Austin Convention Ctr</div>
            </div>
          </div>
          <div class="card__row">
            <div class="card__icon"><i class="fas fa-heart"></i></div>
            <div class="card__time">
              <div>Saturday</div>
            </div>
            <div class="card__detail">
              <div class="card__source text-bold">Little Rock Air Show</div>
              <div class="card__description">See the Blue Angels fly with roaring thunder</div>
              <div class="card__note">11:00pm, Jacksonville Airforce Base</div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card__header">
          <div class="card__header-title text-light">Recent <strong>Documents</strong>
            <a href="#" class="card__header-link text-bold">View All</a>
          </div>
          <div class="settings">
            <div class="settings__block"><i class="fas fa-edit"></i></div>
            <div class="settings__block"><i class="fas fa-cog"></i></div>
          </div>
        </div>
        <div class="card">
          <div class="documents">
            <div class="document">
              <div class="document__img"></div>
              <div class="document__title">tesla-patents</div>
              <div class="document__date">07/16/2018</div>
            </div>
            <div class="document">
              <div class="document__img"></div>
              <div class="document__title">yearly-budget</div>
              <div class="document__date">09/04/2018</div>
            </div>
            <div class="document">
              <div class="document__img"></div>
              <div class="document__title">top-movies</div>
              <div class="document__date">10/10/2018</div>
            </div>
            <div class="document">
              <div class="document__img"></div>
              <div class="document__title">trip-itinerary</div>
              <div class="document__date">11/01/2018</div>
            </div>
          </div>
        </div>
      </div>
      <div class="card card--finance">
        <div class="card__header">
          <div class="card__header-title text-light">Monthly <strong>Spending</strong>
            <a href="#" class="card__header-link text-bold">View All</a>
          </div>
          <div class="settings">
            <div class="settings__block"><i class="fas fa-edit"></i></div>
            <div class="settings__block"><i class="fas fa-cog"></i></div>
          </div>
        </div>
        <div id="chartdiv"></div>
      </div>
    </div> <!-- /.main-cards -->
  </main>

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> 2018 MTH</p>
    <p>Crafted with <i class="fas fa-heart footer__icon"></i> by <a href="https://www.linkedin.com/in/matt-holland/" target="_blank" class="footer__signature">Matt H</a></p>
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
