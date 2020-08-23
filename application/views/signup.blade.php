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
        

        <div id="register" class="animate form">
          <section class="login_content">
            @php
            $CI =& get_instance();
            @endphp
            {!! form_open('signup') !!}
              {{ $CI->session->flashdata('error') }}
              <h1>Create Account</h1>
              <div>
                {!! $CI->session->flashdata('error_username'); !!}
              <input name="username" id="username" value="{{ $CI->session->flashdata('data_username') }}" type="text" class="form-control" placeholder="Username" />
              </div>
              <div>
                {!! $CI->session->flashdata('error_email'); !!}
                <input name="email" id="email" value="{{ $CI->session->flashdata('data_email') }}"  type="email" class="form-control" placeholder="Email" />
              </div>
              <div>
                {!! $CI->session->flashdata('error_password'); !!}
                <input name="password" id="password" type="password" class="form-control" placeholder="Password" />
              </div>
              <div>
                {!! $CI->session->flashdata('error_repassword'); !!}
                <input name="re_password" id="re_password" type="password" class="form-control" placeholder="Repeat Password" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Signup</button>
              </div>
            {!! form_close() !!}


            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="{{ base_url('login') }}" class="to_register"> Log in </a>
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
  <script src="{{ base_url('assets/gentelella/vendors/validator/validator.js') }}"></script>
</html>