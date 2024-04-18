@extends('conjunto')

@section('body')
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #ddd;
    }

    .table td img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .table td a {
        text-decoration: none;
        color: #333;
    }
    .tabla{
        max-width: 60%;
        margin: 0 auto;
    }
    .btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-text {
        font-size: 16px;
        font-weight: bold;
    }
</style>
<body>
    <div class="">
        <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tickets') }}
                </h2>
        </x-slot>
        <a href="{{ route('prov_create') }}" class="btn btn-primary">
            <div class="btn-text">Agregar</div>
        </a>
        
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prov as $item)
                        <tr>
                            <td>{{$item->id_proveedores}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->correo}}</td>
                            <td>{{$item->direccion}}</td>
                            <td>{{$item->telefono}}</td>
                            <td>
                                <a href="{{ route('prov_edit', ['id' => $item->id_proveedores]) }}"><img src="{{asset('images\edit-svgrepo-com.svg')}}" alt="Editar"></a>
                                <a href="{{ route('prov_destroy', ['id' => $item->id_proveedores]) }}"><img src="{{asset('images\trash-svgrepo-com (2).svg')}}" alt="Eliminar"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</body>
</html>
</x-app-layout>
@endsection