<div>
    <div class="card-header bg-navy">
        Items del presupuesto
    </div>
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
                    @can('client_create')
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#create">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    @endcan
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            @php
            $items = [];
            @endphp
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['subtotal'] }}</td>
                    <td>
                        <button wire:click="removeItem({{ $item['id'] }})"
                            class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay items</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @include('budget::partials.modalItemsAdd')



</div>
