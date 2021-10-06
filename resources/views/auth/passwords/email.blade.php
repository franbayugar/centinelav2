@extends('templates.auth-template')

@section('title-head', 'Reestablecer Contraseña')

@section('content')

<div class="form-box" id="login-box">
    <div class="header">Centinela</div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

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

        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block">Enviar enlace para reestablecer</button>  
            
            <p><a href="{{ route('login') }}" class="text-center">¿Ya tienes una cuenta? Iniciar sesión</a></p>

            <p><a href="{{ route('register') }}" class="text-center">¿No tienes una cuenta? Crear cuenta</a></p>

        </div>
    </form>
    
</div>

@endsection
