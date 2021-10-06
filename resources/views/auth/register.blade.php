@extends('templates.auth-template')

@section('title-head', 'Ingresar')

@section('content')

<div class="form-box" id="login-box">
    <div class="header">Centinela</div>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="body bg-gray">
            {{-- Nombre --}}
            <div class="form-group">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">

                @if ($errors->has('name'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Apellido --}}
            <div class="form-group">
                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required placeholder="Apellido">

                @if ($errors->has('lastname'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Email --}}
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

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
            {{-- Repetir contraseña --}}
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir contraseña">
            </div>

        </div>
        <div class="footer">                    

            <button type="submit" class="btn bg-olive btn-block">Registrate</button>

            <a href="{{ route('login') }}" class="text-center">¿Ya tienes una cuenta? Iniciar sesión</a>

        </div>

    </form>
    
</div>


@endsection