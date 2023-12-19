@extends('adminlte::page')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
    <div>
        @livewire('productos-table')
        @vite('resources/css/app.css')
    </div>
@stop

@section('css')
    <!-- Agrega tus estilos CSS si es necesario -->
@stop

@section('js')
    <!-- Agrega tus scripts JS si es necesario -->
@stop
