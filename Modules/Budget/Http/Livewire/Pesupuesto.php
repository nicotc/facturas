<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\Budget\Entities\Presupuesto;
use Modules\Budget\Entities\DesgloseItems;
use Image;



class Pesupuesto extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $photo;
    public $precioUnitario;
    public $precioTotal;
    public $cantidad;
    public $desgloseunitario;
    public $desglosetotal;
    public $idIt;

    public $codigoProyecto;

    protected $listeners = [
        'searchLocal', 'actualizapresupuesto'
    ];

    public function actualizapresupuesto(){
        $this->getUsers();
    }

    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {

        return [
            'modelo' => 'Modelo',
            'descripcion' => "Descripción",
            'area' => "Area",
            'cantidad' => "Cantidad",
            'precio_unitario' => "Precio Unitario",
            'total' => "Total"
        ];


    }

    public function sort($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortColumn = $column;
    }

    private function buildQuery()
    {
        return Presupuesto::select(
            "id",
            "modelo",
            "numero_orden",
            "descripcion",
            "area",
            "cantidad",
            "precio_unitario",
            "total"
        )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('descripcion', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('area', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('cantidad', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('precio_unitario', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('total', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->where('numero_orden', $this->codigoProyecto)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }

    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }

    public function render()
    {

        return view(
            'budget::livewire.pesupuesto',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    //RUD

    public function editId($id)
    {

        $update = Presupuesto::where('id', $id)->first();
        $desglose = DesgloseItems::where('id', $update->desglose_items)->first();

        $this->desgloseunitario = $desglose->precio_unitario;
        $this->desglosetotal = $desglose->total;

        $this->idIt = $id;
        $this->cantidad  = $update->cantidad;
        $this->precioUnitario = $update->precio_unitario;
        $this->precioTotal = $update->total;
    }

    public function edit()
    {

        $update = Presupuesto::where('id', $this->idIt)->first();
        $update->precio_unitario = $this->precioUnitario;
        $update->total = $this->precioUnitario*$this->cantidad;
        if ($this->photo != null) {
            $photo = Image::make($this->photo)
                ->resize(250, 250)->encode('jpg', 100);
            $file_path = 'proyectos/' . "_" . time() . '.jpg';
            Storage::disk('public')->put($file_path, $photo);
            $update->modelo = "storage/" . $file_path;
        }
        $this->photo ="";
        $update->save();
        $this->emit('update');

    }




    public function updatedprecioUnitario(){
        $this->precioTotal = $this->precioUnitario*$this->cantidad;
    }


    public function resetInput()
    {
        $this->photo = "";
        $this->precioUnitario = "";
        $this->precioTotal = "";
        $this->cantidad ="";
    }


    public function pdf($id){
        redirect()->route('budget.print', $id);
    }








}
