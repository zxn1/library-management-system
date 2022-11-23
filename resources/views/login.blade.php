<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LMS - SK Pengkalan Ara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'><link rel="stylesheet" href="{{ asset('/resource/style-login.css') }}">
  <link rel="stylesheet" href="{{ asset('/resource/bootstrap/css/bootstrap.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->

<div class="row" style="margin-top : 15px;">

  <div class="col-lg-4">
    
  </div>

    <div class="col-lg-3">
      <p style="color : white; font-size : 25px; margin-top : 15px; font-family: 'Oxygen'; margin-left : 15px;">Library Management System</br>SK Pengkalan Ara</p>
    </div>
    <div class="col-lg-2">
      <img src="{{asset('/src/img/logo_sekolah.png')}}" height="130px" style="margin : auto"/>
    </div>

  <div class="col-lg-3">
    
  </div>

</div>


<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>LOGIN</h2>
    </div>

    <div class='box-login'>


      <form action="{{url('/loginGet')}}" method="POST">
        @csrf
        <div class='fieldset-body' id='login_form'>
            <input type="button" onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'></input>
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
					    <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Need Help?</h3>
    </p>
					    <div class='line-wh'></div>
    					<button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
    <button onclick="" class='b-support' title='Contact Support'> Contact Support</button>
    					<div class='line-wh'></div>
    <button onclick="" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button>
  				</div>
</div>


 
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script><script  src="{{ asset('/resource/script-login.js') }}"></script>

</body>
</html>