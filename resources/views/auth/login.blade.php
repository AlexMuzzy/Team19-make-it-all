<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Make-it-all Helpdesk Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" type="text/css" rel="stylesheet"
        media="screen,projection" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="{{asset('css/login.css')}}"  type="text/css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body>
    <div class="login">
        <div class="row">
            <div class="col m6 push-m6 col-respons">
                <div class="row m-gradient full-page z-depth-3">
                    <div class="icon-aligner center">
                        <i class="material-icons d1">build</i>
                    </div>
                </div>
            </div>   
            <div class="col m6 pull-m6">
                <div class="container">
                    <div class="aligner">
                        <div class="row">

                            <span class="title">Sign in</span>
                            <div class="subtitle">
                                <span class="subtitle">Please enter your details to log in.</span>
                            </div>

                        </div>
                        <div class="row">

                            <form class="col s12 form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="login" type="text" class="validate {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}">
                                        <label for="login">{{ __('Username') }}</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="password" type="password" class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                        <label for="password">Password</label>
                                    </div>

                                </div>

                                <div class="button">
                                    <button class="btn waves-effect waves-light m-gradient login" type="submit">{{ __('Login') }}</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>