@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@vite('resources/css/app.css')

    <div>
        @can('home')
            <div class="d-grid gap-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Crear </a>
            </div>
        @endcan

        <div class="card">
            <!-- Buscador -->
            <div class="card-header">
                <input wire:model="search" class="form-control" placeholder="Buscar">
            </div>
            <!-- Fin Buscador -->

            @if ($users->count())
                <div class="card-body overflow-auto sm:max-h-[400px]">
                    <table class="table table-striped">
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Última vez</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col" style="text-align: center;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $usuario)
                                    @if (!$usuario->hasRole('Administrador'))
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <th scope="row"> 
                                                <img
                                                    src="{{ $usuario->foto_perfil ? app('firebase.storage')->getBucket()->object($usuario->foto_perfil)->signedUrl(Carbon\Carbon::now()->addSeconds(5)) : asset('/img/user-default.jpeg') }}"
                                                    alt=""
                                                    class="h-16 w-16" 
                                                >
                                            </th>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->telefono }}</td>
                                            <td>{{ $usuario->role_name() }}</td>
                                            <td>
                                                @if (Cache::has('user-is-online-' . $usuario->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif
                                            </td>

                                            <td class="text-center" style="display: inline-block"><span
                                                    class="badge {{ $usuario->estado ? 'bg-success' : 'bg-secondary' }}">{{ $usuario->estado ? 'ACTIVO' : 'INACTIVO' }}</span>
                                            </td>
                                            <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a href="{{ url('/empleados/' . $usuario->id . '/') }}"
                                                        class="btn btn-success">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('users.edit', $usuario) }}" class="btn btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>

                                                    <form action="{{ url('/users/' . $usuario->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            onclick="return confirm('¿Estás Seguro de Eliminarlo?')"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2.5 rounded">
                                                            <i class="fas fa-trash text-xg w-6 h-6"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                </div>{{-- 
            <div class="card-footer py-0">
                {{ $users->links() }}
            </div> --}}
            @else
                <div class="card-body py-10">
                    <strong>No se encontró usuario</strong>
                </div>
            @endif
        </div>
    </div>
@stop

@section('content')
    {{-- @livewire('admin.user-index') --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
