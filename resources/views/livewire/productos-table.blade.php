@section('content')



    <div class="card">

        <div class="d-grid gap-2">
            <a class="btn btn-success" href="{{ route('productos.create') }}"> Crear </a>
        </div>
        <!-- buscador-->
        <div class="card-header">
            <input wire:model.debounce.500ms="search" wire:keydown.enter="buscar" class="form-control"
                placeholder="Buscar por nombre">
        </div>

        <!-- fin buscador-->

        @if (isset($productos) && $productos->count())
            <div class="card-body overflow-auto sm:max-h-[400px]">
                <table class="table table-striped" id="table_productos">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio de compra</th>
                            <th scope="col">Precio de venta</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Imagen</th>
                            <th scope="col" style="text-align: center;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio_compra }}</td>
                                <td>{{ $producto->precio_venta }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{!! $producto->estado
                                    ? '<span class="badge bg-success">DISPONIBLE</span>'
                                    : '<span class="badge bg-secondary">NO DISPONIBLE</span>' !!}</td>
                                <td>
                                    @if ($producto->imagen)
                                        <img src="{{ asset($producto->imagen) }}" alt="Imagen del Producto"
                                            style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <img src="{{ asset('img/producto-default.jpg') }}" alt="Imagen del Producto"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </td>

                                <td style="text-align: right;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="{{ route('producto.show', ['producto' => $producto->id]) }}" class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a> 
                                        <a href="{{ route('producto.edit', $producto) }}" class="btn btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a> --}}
                                        <form action="{{ route('productos.destroy', ['producto' => $producto->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminarlo?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2.5 rounded">
                                                <i class="fas fa-trash text-xg w-6 h-6"></i>
                                            </button>
                                        </form>



                                        {{-- <form action="{{ url('/producto/' . $usuario->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Estás Seguro de Eliminarlo?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2.5 rounded">
                                                <i class="fas fa-trash text-xg w-6 h-6"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-0">
                {{ $productos->links() }}
            </div>
        @else
            <div class="card-body py-10">
                <strong>No se encontraron productos</strong>
            </div>
        @endif
    </div>
