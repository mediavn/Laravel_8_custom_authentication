<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    <section class="hero is-fullheight">
      <div class="hero-body has-text-centered">
        <div class="login">
          <img src="https://logoipsum.com/logo/logo-1.svg" width="325px" />
          <form action="{{ route('auth.check') }}" method="post"> 
          @csrf
            @if(Session::get('success'))
                <div class="notification is-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="notification is-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <div class="field">
              <div class="control">
                <input class="input is-medium is-rounded" type="email" placeholder="hello@example.com"  name="email" value="{{ old('email') }}" />
                <p class="help is-danger">@error('email'){{ $message }} @enderror</p>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input class="input is-medium is-rounded" type="password" placeholder="**********" name="password" value="{{ old('password') }}" />
                <p class="help is-danger">@error('password'){{ $message }} @enderror</p>
              </div>
            </div>
            <br />
            <button class="button is-block is-fullwidth is-primary is-medium is-rounded" type="submit">
              Login
            </button>
          </form>
          <br>
          <nav class="level">
            <div class="level-item has-text-centered">
              <div>
                <a href="#">Forgot Password?</a>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <a href="register">Create an Account</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </section>
  </body>

</html>