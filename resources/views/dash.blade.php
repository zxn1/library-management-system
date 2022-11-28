@extends('dashboard')
@section('content')
<main class="main">
    <div class="main-header">
      <div class="main-header__intro-wrapper">
        <div class="main-header__welcome">
          <div class="main-header__welcome-title text-light">Papan <strong>Pemuka</strong></div>
          <div class="main-header__welcome-subtitle text-light">Maklumat Pusat Sumber SK Pengkalan Ara</div>
        </div>
        <div class="quickview">
          <div class="quickview__item">
            <div class="quickview__item-total">4143</div>
            <div class="quickview__item-description">
            <svg style="margin-right : 2.5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </svg>
            <span class="text-light">Total Buku</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">11</div>
            <div class="quickview__item-description">
            <svg style="margin-right : 2.5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
            </svg>
              <span class="text-light">Total Kategori</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">173</div>
            <div class="quickview__item-description">
            <svg style="margin-right : 2.5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
            </svg>
              <span class="text-light">Total Pelajar</span>
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
      <div class="card" style="border-radius: 13px;">
        <div class="card__header" style="border-top-left-radius : 13px; border-top-right-radius : 13px;">
          <div class="card__header-title text-light">Jumlah <strong>Buku</strong> bagi setiap <strong style="color :aqua">kategori</strong>
          </div>
          <div class="settings" style="position : relative;top : 5px;">
            <div class="settings__block"><i class="fas fa-edit"></i></div>
            <div class="settings__block"><i class="fas fa-cog"></i></div>
          </div>
        </div>


        <!-- buh sini nanti data data pasal kategori setiap buku -->
        <div style="width : 100%;">
            <div class="overflow-auto" style="height : 500px;">
            <ol class="list-group list-group-light list-group-numbered" style="margin : 17px;">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Fiksyen Melayu</div>
                    Buku berkaitan cerita dongeng bahasa melayu.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Fiksyen Inggeris</div>
                    Buku berkaitan cerita dongeng bahasa melayu.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">15</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Agama</div>
                    Buku berkaitan keagamaan dan kerohanian.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Agama</div>
                    Buku berkaitan keagamaan dan kerohanian.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Agama</div>
                    Buku berkaitan keagamaan dan kerohanian.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Agama</div>
                    Buku berkaitan keagamaan dan kerohanian.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold">Agama</div>
                    Buku berkaitan keagamaan dan kerohanian.
                    </div>
                    <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">12</span>
                </li>
                </ol>
            </div>
        </div>


        <!-- end -->
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
  @stop