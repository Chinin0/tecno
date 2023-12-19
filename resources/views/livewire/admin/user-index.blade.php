<div>
    @can('home')
        <div class="d-grid gap-2">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear </a>
        </div>
    @endcan

    <div class="card">
        <!-- buscador-->
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Buscar">
        </div>
        <!-- fin buscador-->

        @if ($users->count())
            <div class="card-body overflow-auto sm:max-h-[400px]">
                <table class="table table-striped">
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
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>
                                    @if($usuario->profile_photo_path)
                                        <img src="{{ asset($usuario->profile_photo_path) }}" alt="Foto de perfil" class="h-16 w-16">
                                    @else
                                        <span>No hay foto de perfil</span>
                                    @endif
                                    @error('profile_photo_path')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                
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
                                        class="badge {{ $usuario->estado ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $usuario->estado ? 'ACTIVO' : 'INACTIVO' }}</span>
                                </td>
                                <td style="text-align: right;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('users.show', ['user' => $usuario->id]) }}"
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
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-0">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body py-10">
                <strong>No se encontró usuario</strong>
            </div>
        @endif
    </div>
</div>
