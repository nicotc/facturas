<div>
    <div class="card-body">
        <div class="row ">
            <div class="col-md-6">
                @can('users export')
                <div class="btn-group">
                    <button type="button" class="btn btn-default" wire:click='exportExcel()'>
                        <i class="fas fa-file-excel"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fas fa-file-csv"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fas fa-file-pdf"></i>
                    </button>
                </div>
                @endcan
            </div>
            <div class="col-md-6 ">
                <div class="btn-group float-right">
                    @can('budget_create')
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#create">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    @endcan
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
                    <th>{{ __('Actions') }}</th>
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
                            <button type="button" class="btn btn-default" wire:click='show({{$item->id}})'>
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                   <i class="fas fa-traffic-light"></i>  <span class="sr-only"></span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" wire:click='status({{$item->id}} , 0)'>Pendiente de Aprobación</a>
                                    <a class="dropdown-item" wire:click='status({{$item->id}} , 1)'>Aprobado</a>
                                    <a class="dropdown-item" wire:click='status({{$item->id}} , 2)'>Rechazado</a>
                                    <a class="dropdown-item" wire:click='status({{$item->id}} , 3)'>En Progreso</a>
                                    <a class="dropdown-item" wire:click='status({{$item->id}} , 4)'>Finalizado</a>
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-default" wire:click='status({{$item->id}})'>
                                <i class="fas fa-traffic-light"></i>
                            </button> --}}
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editarPresupuesto">
                                <i class="fas fa-edit"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
                                <i class="fas fa-trash"></i>
                            </button> --}}
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="{{ count($headers)+1 }}" class="text-center">
                        {{ __("No data found") }}
                    </td>
                </tr>
                @endif
            </tbody>

        </table>
        {{ $data->links() }}
    </div>
    @include('budget::partials.modalAdd')

</div>


