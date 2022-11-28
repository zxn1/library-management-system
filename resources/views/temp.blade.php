<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>LMS - SK Pengkalan Ara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
<link rel="stylesheet" href="{{ asset('/resource/style-login.css') }}">
<link rel="stylesheet" href="{{ asset('/resource/bootstrap/css/bootstrap.css') }}"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('./resource/wave.style.css')}}">
<style>

  html, body
  {
    width : '100%';
    overflow-x : hidden;
  }

</style>
</head>
<body>
<!-- partial:index.partial.html -->

<div class="waveWrapper waveAnimation" style="z-index : -3; opacity : 0.6;">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('./src/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('./src/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('./src/img/wave-bot.png')}}')"></div>
  </div>
</div>

<div class="row" style="margin-top : 15px;">
  <div class="col-lg-4">
  </div>
    <div class="col-lg-3">
      <p style="color : white; font-size : 25px; margin-top : 15px; font-family: 'Oxygen'; margin-left : 20px; position : relative; top : 10px">Sistem Pengurusan</p>
      <p style="color : white; font-size : 18px; font-family: 'Oxygen'; margin-left : 20px;">Perpustakaan SK Pengkalan Ara</p>
    </div>
    <div class="col-lg-2">
      <center>
        <img src="{{asset('/src/img/logo_sekolah.png')}}" height="130px" style="margin : auto"/>
      </center>
    </div>
  <div class="col-lg-3">
  </div>
</div>


<!-- sini -->
@yield('content')
<!-- end sini -->


<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
    <script  src="{{ asset('/resource/script-login.js') }}"></script>
    <script>

      //responsive features
      if(window.screen.height <= 840)
      {
        document.getElementById("box").style.marginTop = '100px';
      }
      
      //responsive features
      function adjustBox()
      {
        //alert('sampai');
        if(screen.width <= 602)
        {
          if(screen.width <= 487)
          {
            document.getElementById("box").style.left = '20%';
          } else {
            document.getElementById("box").style.left = '40%';
          }
        }
      }

      function normalizeBox()
      {
        if(screen.width <= 602)
        {
          document.getElementById("box").style.left = '50%';
        }
      }

    </script>

</body>
</html>