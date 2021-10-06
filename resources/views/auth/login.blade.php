@extends('templates.auth-template')

@section('title-head', 'Ingresar')

@section('content')

<div class="form-box" id="login-box">
    <div class="header">Centinela</div>
    <form action="{{ route('login') }}" method="POST">

        @csrf

        <div class="body bg-gray">
            {{-- Email --}}
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

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
            {{-- Check recordarme --}}
            <div class="form-group">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar mis datos
            </div>

        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block">Ingresar</button>  
            
            {{-- <p><a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a></p> --}}
            
            {{-- <a href="{{ route('register') }}" class="text-center">¿No tienes una cuenta? Crear cuenta</a> --}}

        </div>
    </form>
    
</div>

@endsection