@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Crear un Presupuesto') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <b>Nombre y apellido o razón social:</b>
                            </div>
                            <div class="col-6">
                                {{ $contactClient->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <b>Domicilio fiscal:</b>
                            </div>
                            <div class="col-6">
                                {{ $contactClient->address }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <b>Teléfono:</b>
                            </div>
                            <div class="col-6">
                                {{ $contactClient->phone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <b>Rif / Cédula:</b>
                            </div>
                            <div class="col-6">
                            {{ $contactClient->type }}  {{ $contactClient->rif }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Datos de la obra
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                    <label for="Descripcion">Tipo de servicio </label>
                            </div>
                            <div class="col-6">
                                    {{ Form::select('description', $services, null, ['class' => 'select2']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="Descripcion">Direccion de la obra </label>
                            </div>
                            <div class="col-6">
                                {{ Form::select('contacts_address_id', $address, null, ['class' => 'select2']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
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
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ $item['price'] }}</td>
                                    <td>{{ $item['subtotal'] }}</td>
                                    <td>
                                        <button wire:click="removeItem({{ $loop->index }})" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>






    </div>
</section>
@endsection


@section('js')



@endsection
