<div>




<div class="row mb-3">
    <div class="col-md-11">
        <h2>{{ $desglose->area }}:</h2><label>{{ $desglose->descripcion }} </label>
    </div>
    <div class="col-md-1">
        <div class="btn-group float-right">
            <button class="btn btn-default bg-orange" wire:click='cambiar()'> <i class="fas fa-house-user"></i> Items</button>
        </div>
    </div>
</div>



<div class="row mb-3">
    <div class="col-md-6">
        <h2>Desglose de Materiales </h2>
    </div>
    <div class="col-md-6 ">
        <div class="btn-group float-right">

            <button type="button" class="btn btn-default" wire:click='resetInput()' data-toggle="modal"
                data-target="#modalAddDesgloseDesglose">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>
</div>

<table class="table table-striped">
        <thead>
            <tr>
                @foreach ($headers as $key => $value)
                <th style="cursor: pointer" wire:click="sort('{{ $key }}')">
                    @if($key == $sortColumn)
                    <span> {!! $sortDirection == 'asc' ? '&#8659': '&#8657;' !!} </span>
                    @endif
                    {{ is_array($value) ? $value['label'] : $value }}
                </th>
                @endforeach
                <th>{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($data))
            @foreach ($data as $item)
            <tr>
                @foreach ($headers as $key => $value)
                <td>
                    {!! is_array($value) ? $value['func']($item->$key) : $item->$key !!}
                </td>
                @endforeach
                <td>
                    <div class="btn-group mb-3">

                        <button type="button" class="btn btn-warning" wire:click='editId({{$item->id}})' data-toggle="modal"
                            data-target="#modalEditDesgloseDesglose">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" wire:click="deleteId({{ $item->id }})"
                            data-toggle="modal" data-target="#modalDeleteDesgloseDesglose">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="{{ count($headers)+3 }}" class="text-center">
                    {{ __("No hay Registros") }}
                </td>
            </tr>
            @endif
        </tbody>

    </table>
    {{ $data->links() }}

<div class="row mb-3">
    <div class="col-md-12">
       <b> Total Materiales:</b> {{ $totalMaterial }}
    </div>

</div>



@include('budget::partials.modalAddDesgloseDesglose')
@include('budget::partials.modalEditDesgloseDesglose')
@include('budget::partials.modalDeleteDesgloseDesglose')


</div>
