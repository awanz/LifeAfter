<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FavIcon -->
    <link rel="icon" href="{{ base_url("favicon.ico") }}" type="image/ico" />
    <title>{{ $title }}</title>

    @include('layouts.head')
    <!-- Animate.css -->
    <link href="{{ base_url('assets/gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! form_open('login') !!}
              @php
              $CI =& get_instance();
              @endphp
              <h1>Login Form</h1>
              {!! $CI->session->flashdata('registered'); !!}
              {!! $CI->session->flashdata('alert_login'); !!}
              <div>
                {!! $CI->session->flashdata('error_username'); !!}
                <input name="username" id="username" type="text" class="form-control" placeholder="Username" />
              </div>
              <div>
                {!! $CI->session->flashdata('error_password'); !!}
                <input name="password" id="password" type="password" class="form-control" placeholder="Password" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
            {!! form_close() !!}

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="{{ base_url('signup') }}" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h2><i class="fa fa-cloud"></i> Awan</h2>
                <p>©2020 All Rights Reserved.</p>
              </div>
            </div>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>