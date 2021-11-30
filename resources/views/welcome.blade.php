
@extends('layouts.app')

@section('pageTitle', 'Sistema de Gestión de Planes de Estudio')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />
<div class="loginbody">
    <div class="container"> 
        <div class="formlogin" style="  background: rgb(79,43,105); background: linear-gradient(94deg, rgba(79,43,105,1) 25%, rgba(111,94,124,1) 100%, rgba(117,96,133,1) 100%); border: 3px solid black; margin: auto">
            
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert"> X </button>
                    <strong> {{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <u1>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                    </u1>
                </div>
            @endif

            <form method="post" action="{{ route('login') }}">

                {{ csrf_field() }}
                <div class = "header"> Sistema de Gestión de Planes de Estudio - Universidad de Talca </div>
                <div class="form-group" style="margin: auto; width: 75%">
                    <label>Correo Electrónico</label>
                    <input type="email" class="form-control form-control-lg" name="email" style="width: 830px; margin-bottom: 20px" />
                </div>

                <div class="form-group" style="margin: auto; width: 75%">
                    <label>Contraseña</label>
                    <input type="password" class="form-control form-control-lg" name="password" style="width: 830px; margin-bottom: 30px" />
                </div>

                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" style="margin-left: 135px"/>
                        <label class="form-check-label" for="remember" style="margin-left: 155px; margin-bottom: 30px"> Recordarme </label>
                    </div>
                </div>

                <button type="submit" class="button" name="login" value="Login">Conectarse</button>

            </form>
        </div>

    </div>

</div>
@endsection
