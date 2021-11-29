@extends('layouts.app')

@section('pageTitle', 'Lista de planes')

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />


</head>
@section('content')

<navbar-component> </navbar-component>
<body style="background-image:none; background-color: #f6f6f6">


    <h1></h1>

    <div class="card" style="width:auto; height: auto">
        <div class="card-body">
            <div class="col text-center">
                <button class="agregar_plan" href="" data-toggle="modal" data-target="" style="color:black;">
                    Añadir plan de estudio                    
                </button>
            </div>
        </div>
    </div>

</body>

@endsection
