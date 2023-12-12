@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop
@vite('resources/css/app.css')

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Roles disponibles</h2>
            <form wire:submit.prevent="updateRoles">
                @foreach ($roles as $role)
                    <div>
                        <label>
                            <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}" class="mr-1">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary mt-2">Asignar Rol</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
