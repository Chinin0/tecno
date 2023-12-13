@extends('adminlte::page')

@section('content_header')
    <h1>Registrar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Introduzca su nombre"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input name="email" type="email" class="form-control" id="email"
                        placeholder="Introduzca su correo" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input name="direccion" type="text" class="form-control" id="direccion"
                        placeholder="Introduzca su direccion" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="number" class="form-control" id="telefono"
                        placeholder="Introduzca su telefono" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="password"
                        placeholder="Introduzca su contraseña" required>
                </div>

                <div class="form-group">
                    <label for="role">Rol</label>
                    <select name="role" class="form-control select2" style="width: 100%;">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"> {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ url('/empleado') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
