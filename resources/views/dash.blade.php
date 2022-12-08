@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<main class="main">
    <div class="main-header">
      <div class="main-header__intro-wrapper">
        <div class="main-header__welcome">
          <div class="main-header__welcome-title text-light">Papan <strong>Pemuka</strong></div>
          <div class="main-header__welcome-subtitle text-light">Maklumat Pusat Sumber SK Pengkalan Ara</div>
        </div>
        <div class="quickview">
          <div class="quickview__item">
            <div class="quickview__item-total">{{ $booktot }}</div>
            <div class="quickview__item-description">
            <svg style="margin-right : 2.5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </svg>
            <span class="text-light">Total Buku</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">{{ $categtot }}</div>
            <div class="quickview__item-description">
            <svg style="margin-right : 2.5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
            </svg>
              <span class="text-light">Kategori Buku</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">{{ $studtot }}</div>
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

      <div class="overviewCard" style="background-color : #17a2b8; border-radius : 8px;">
       <table>
        <tr>
            <td>
            <svg style="position : relative; top : -25px; color : white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            </td>
        </tr>
        <tr>
            <p style="font-family : Montserrat; color : white; font-size : 13px; margin-left : 7px;">Jumlah stok buku</p>
            <p style="font-family : Montserrat; color : white; font-size : 50px; margin-right : 7px;">{{ $booktot }}</p>
        </tr>
       </table>
      </div>

      <div class="overviewCard" style="background-color : #28a745; border-radius : 8px;">
       <table>
        <tr>
            <td>
            <svg style="position : relative; top : -25px; color : white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm.5 5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1 0-1zM4 8.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm2 3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            </td>
        </tr>
        <tr>
            <p style="font-family : Montserrat; color : white; font-size : 13px; margin-left : 7px;">Jumlah buku dipinjam</p>
            <p style="font-family : Montserrat; color : white; font-size : 50px; margin-right : 7px;">{{ $bookloan }}</p>
        </tr>
       </table>
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
                @foreach( $categ as $index => $data )
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                      <div class="fw-bold">{{ $data->category_name }}</div>
                      Jumlah kesemua buku yang didalam kategory '{{ $data->category_name }}'
                      </div>
                      <span class="badge badge-primary rounded-pill" style="transform: scale(1.3);">{{ $arr_bookcateg[$index] }}</span>
                  </li>
                @endforeach
                </ol>
            </div>
        </div>


        <!-- end -->
      </div>

      <div class="card card--finance" style="border-radius: 13px;">
        <div class="card__header" style="border-top-left-radius : 13px; border-top-right-radius : 13px;">
          <div class="card__header-title text-light">Monthly <strong>Spending</strong>
            <a href="#" class="card__header-link text-bold">View All</a>
          </div>
          <div class="settings" style="position : relative; top : 2px;">
          <svg style="margin : 5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
          </svg>
          </div>
        </div>
        <center><div style="margin-top : 5px;" id="barchartz" style="position : relative;"></div></center>
      </div>

      <div class="card">
        <div class="card__header" style="height : 90px; border-radius : 8px; opacity : 0.3;">
          <div class="card__header-title text-light">
          </div>
        </div>
      </div>
    </div> <!-- /.main-cards -->
    
    <script>
      var options = {
            chart: {
              type: 'bar',
              width: '95%'
            },
            series: [{
              data: [{
                x: 'Tahun 1',
                y: {{ $year1 }}
              }, {
                x: 'Tahun 2',
                y: {{ $year2 }}
              }, {
                x: 'Tahun 3',
                y: {{ $year3 }}
              }, {
                x: 'Tahun 4',
                y: {{ $year4 }}
              }, {
                x: 'Tahun 5',
                y: {{ $year5 }}
              }, {
                x: 'Tahun 6',
                y: {{ $year6 }}
              }]
            }]
          }

      var chart = new ApexCharts(document.querySelector("#barchartz"), options);

      chart.render();
    </script>
  </main>
  @stop