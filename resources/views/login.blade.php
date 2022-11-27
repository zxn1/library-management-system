@extends('temp')
@section('content')

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
            <input type="button" id="moreop" onclick="openLoginInfo();adjustBox();" class='b b-form i i-more' title='Mais Informações'></input>
                <p class='field'>
            <label for='user'>E-MAIL</label>
            <input type='text' id='user' name='user' title='Username' />
            <span id='valida' class='i i-warning'></span>
            </p>
            <p class='field'>
            <label for='pass'>PASSWORD</label>
            <input type='password' id='pass' name='pass' title='Password' />
            <span id='valida' class='i i-close'></span>
            </p>

            <label class='checkbox'>
                <input type='checkbox' value='TRUE' title='Keep me Signed in' /> Keep me Signed in
            </label>
                <input type='submit' id='do_login' value='GET STARTED' title='Get Started' />
        </div>
      </form>

    </div>
  </div>
  <div class='box-info'>
					    <p><button onclick="closeLoginInfo();normalizeBox();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Need Help?</h3>
    </p>
					    <div class='line-wh'></div>
    					<button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
    <button onclick="" class='b-support' title='Contact Support'> Contact Support</button>
    					<div class='line-wh'></div>
    <a href="{{route('register')}}"><button onclick="" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button></a>
  				</div>
</div>
@stop