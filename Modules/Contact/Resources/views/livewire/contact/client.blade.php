  <div class="card-body">
    <div class="row ">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 ">
            <div class="btn-group float-right">
                @can('client_create')
                <button type="button" class="btn btn-default" wire:click='add()'>
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
                                    <button type="button" class="btn btn-primary" wire:click='show({{$item->id}})'>
                                        <i class="fas fa-eye"></i>
                                    </button>

                         
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
