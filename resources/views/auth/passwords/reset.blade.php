@extends('templates.auth-template')

@section('title-head', 'Reestablecer Contraseña')

@section('content')

<div class="form-box" id="login-box">
    <div class="header">Centinela</div>
    <form action="{{ route('password.request') }}" method="POST">

        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="body bg-gray">
            {{-- Email --}}
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email">

                @if ($errors->has('email'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Contraseña --}}
            <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">

                @if ($errors->has('password'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Confirmar Contraseña --}}
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Contraseña">
            </div>

        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block">Reestablecer Contraseña</button>

            <p><a href="{{ route('login') }}" class="text-center">¿Ya tienes una cuenta? Iniciar sesión</a></p>
            
            <p><a href="{{ route('register') }}" class="text-center">¿No tienes una cuenta? Crear cuenta</a></p>

        </div>
    </form>
    
</div>

@endsection
