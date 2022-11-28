@extends('temp')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class='box' id="box">
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>LOGIN</h2>
    </div>

    <div class='box-login'>

      <form action="{{url('/loginGet')}}" method="POST">
        @csrf
        <div class='fieldset-body' id='login_form'>

        @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        @if (session('logout'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ session('logout') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif


            <input type="button" id="moreop" onclick="openLoginInfo();adjustBox();" class='b b-form i i-more' title='Mais Informações'></input>
                <p class='field'>
            <label for='user'>E-MAIL</label>
            <input type='text' id='email' name='email' title='E-mail' />
            <span id='valida' class='i i-warning'></span>
            </p>
            <p class='field'>
            <label for='pass'>KATA LALUAN</label>
            <input type='password' id='password' name='password' title='Password' />
            <span id='valida' class='i i-close'></span>
            </p>

            <label class='checkbox'>
                <input type='checkbox' value='TRUE' title='Keep me Signed in' /> Kekalkan kata laluan
            </label>
                <input type='submit' id='do_login' value='Log Masuk' title='Log Masuk' />
        </div>
      </form>

    </div>
  </div>
  <div class='box-info'>
					    <p><button onclick="closeLoginInfo();normalizeBox();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Bantuan?</h3>
    </p>
					    <div class='line-wh'></div>
    					<button onclick="" class='b-support' title='Forgot Password?'> Lupa Kata Laluan?</button>
    <button onclick="" class='b-support' title='Contact Support'> Hubungi Sokongan</button>
    					<div class='line-wh'></div>
    <a href="{{route('register')}}"><button onclick="" class='b-cta' title='Sign up now!'> BUAT AKAUN</button></a>
  				</div>
</div>
@stop