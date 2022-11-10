<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card collapsed-card" wire:ignore.self>
                    <div class="card-header bg-olive">
                        <i class="fas fa-dollar-sign"></i> Abonado:<b> {{$totalAbonado}}</b> | Total a pagar:<b> {{ $totalPagar }}</b> |   Deuda:<b> {{$totalPagar - $totalAbonado }}</b>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" >
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            @if($totalPagar >0)
                                <div class="progress">
                                    @php
                                        $porcentaje = round(($totalAbonado * 100) / $totalPagar);
                                    @endphp
                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                        style="width: {{$porcentaje}}%"
                                        aria-valuenow="{{$totalAbonado}}" aria-valuemin="0"
                                        aria-valuemax="{{ $totalPagar }}">{{$porcentaje}}%
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-md-6">



                                </div>
                                <div class="col-md-6 ">
                                    <div class="btn-group float-right">
                                        @can('client_create')
                                        <button type="button" class="btn btn-default" wire:click='resetInput()' data-toggle="modal"
                                            data-target="#crateAbonos">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    @foreach ($headers as $key => $value)
                                        <th>
                                            {{ $value }}
                                        </th>
                                        @endforeach
                                        <th>{{ __('Acciones') }}</th>
                                    <tr>

                                </thead>
                                <tbody>
                           @if(count($data))
                        @foreach ($data as $item)
                        <tr>
                            @foreach ($headers as $key => $value)
                            <td>
                                @if($value == "Fecha")
                                {{ date('d-m-Y', strtotime($item->$key)) }}
                                @else
                                {{ $item->$key }}
                                @endif

                            </td>
                            @endforeach

                            <td>
                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-default" wire:click='show({{$item->id}})'>
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-default" wire:click='editId({{$item->id}})' data-toggle="modal"
                                        data-target="#ItemsEdit" )'>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="{{ count($headers)+3 }}" class="text-center">
                                {{ __("No hay pagos") }}
                            </td>
                        </tr>
                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('budget::partials.modalCreatePagos')
</section>
