  <div class="card-body">
    <div class="row ">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 ">
            <div class="btn-group float-right">

                <button type="button" class="btn btn-default" wire:click='resetInput()' data-toggle="modal"
                        data-target="#modalAddProveedor">
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
                                <span> {!! $sortDirection == 'asc' ? '&#8659': '&#8657;'  !!} </span>
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
                                <button type="button" class="btn btn-warning" wire:click='editId({{$item->id}})' data-toggle="modal"
                                    data-target="#modalEditProveedor">
                                    <i class="fas fa-edit"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-danger" wire:click="deleteId({{ $item->id }})" data-toggle="modal"
                                    data-target="#modalDeleteServicios">
                                    <i class="fas fa-trash"></i>
                                </button> --}}


                                    {{--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
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

        @include('contact::partials.modalAddProveedor')
        @include('contact::partials.modalEditProveedor')
        @include('contact::partials.modalDeleteProveedor')
</div>
