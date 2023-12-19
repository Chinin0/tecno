<?php
namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosTable extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $productos = Producto::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(5);

        return view('livewire.productos-table', compact('productos'));
    }

    public function buscar()
    {
        // Lógica de búsqueda (si es necesario)
    }
}
