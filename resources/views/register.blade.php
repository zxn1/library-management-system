@extends('temp')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('/resource/register.style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<!-- partial:index.partial.html -->
<div class="form_wrapper" style="margin : auto; margin-top : 20px; margin-bottom : 20px; border-radius : 25px;">
  <div class="form_container">
    
  @if (session('status'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  
    <div class="title_container">
      <table>
        <tr>
          <td style="padding-right : 15px;">
            <a href="/">
              <div style="background-color : #dedede; padding : 5px; border-radius : 100%; width : 32px; height : 32px;">
                <svg style="margin : auto;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
              </div>
            </a>
          </td>
          <td>
            <h2>Borang Pendaftaran Akaun</h2>
          </td>
        </tr>
      </table>
    </div>
    <div class="row clearfix">
      <div>
        <form action="/getRegister" method="POST">
          {{ csrf_field() }}
          <div class="input_field" style="position : relative;top : 10px;"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="E-mail" required />
          </div>
          <div class="input_field" style="padding-bottom : 25px;"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Kata Laluan" required />
          </div>
          <div class="input_field" style="padding-bottom : 25px;"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="cpassword" placeholder="Konfirmasi Kata Laluan" required />
          </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="fname" placeholder="Nama pertama" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="lname" placeholder="Nama akhir" required />
              </div>
            </div>
          </div>
            <div class="input_field radio_option" style="padding-bottom : 25px;">
              <input type="radio" name="radiogroup1" id="rd1" value="1">
              <label for="rd1">Lelaki</label>
              <input type="radio" name="radiogroup1" id="rd2" value="2">
              <label for="rd2">Perempuan</label>
              </div>
              <div class="input_field select_option">
                <select name="role">
                  <option selected disabled>Pilih peranan</option>
                  <option value="1">Guru sekolah</option>
                  <option value="2">Pengawas Pusat Sumber (PSS)</option>
                </select>
                <div class="select_arrow"></div>
              </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" name="agree" id="cb1">
    			<label for="cb1">Setuju dengan policy untuk mencipta akaun baru</label>
            </div>

          <input class="button" type="submit" value="Daftar" />
        </form>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src="{{asset('/resource/register.script.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
@stop