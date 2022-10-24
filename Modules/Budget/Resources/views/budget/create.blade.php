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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Item del Presupuesto</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Materiales</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Descripcion</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Catidad</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Precio Unitario</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Precio Total</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Desglose del Item</h3>
                    </div>
                    <div class="card-body">
                        <table class="table-condensed" style="width: 100%;">
                            <thead class="card-footer  border border-solid">
                                <tr>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-left text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Cantidad
                                    </th>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Material
                                    </th>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-left text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Costo uni Base
                                    </th>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Costo Total Real
                                    </th>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Costo unit Proyecto
                                    </th>
                                    <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                        Costo Total Proyecto
                                    </th>


                                </tr>
                            </thead>
                            <tbody id="budget">
                                <tr class="callout callout-info">
                                    <td class="px-5 py-4 text-left align-top">
                                        <input type="text" class="form-control" name="article" id="article"
                                            placeholder="Articulo">
                                    </td>
                                    <td class="px-5 py-4 text-right align-top">
                                        <input type="number" class="form-control" name="quantity" id="quantity"
                                            placeholder="Cantidad">
                                    </td>
                                    <td class="px-5 py-4 text-left align-top">
                                        <input type="number" class="form-control" name="price" id="price"
                                            placeholder="Precio Unitario">
                                    </td>
                                    <td class="px-5 py-4 text-right align-top">
                                        <label for="total" id="total">0</label>
                                    </td>
                                    <td class="px-5 py-4 text-right align-top">
                                        <input type="number" class="form-control" name="price" id="price"
                                            placeholder="Precio Unitario">
                                    </td>
                                    <td class="px-5 py-4 text-right align-top">
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Precio Unitario">
                                    </td>
                                </tr>
                            </tbody>
                            <footer>
                                <tr class="card-footer">
                                    <td colspan="6" class="p-2 text-center">
                                        <button type="button" onclick="insert_row()"
                                            class="btn btn-primary">Agregar</button>
                                    </td>
                                </tr>
                            </footer>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div clsas="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Extras</h3>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>
                                    EXTRAS
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TRANSPORTE
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PERFILES DE CINTA
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CINTA
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CHIQUILLO
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SENSOR TACTIL
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TRANSFORMADOR
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="price" id="price">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')

<script>
    function insert_row(){
           $("#budget").append(`<tr class="callout callout-info">
            <td class="px-5 py-4 text-left align-top">
                <input type="text" class="form-control" name="article" id="article" placeholder="Articulo">
            </td>
            <td class="px-5 py-4 text-right align-top">
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Cantidad">
            </td>
            <td class="px-5 py-4 text-left align-top">
                <input type="number" class="form-control" name="price" id="price" placeholder="Precio Unitario">
            </td>
            <td class="px-5 py-4 text-right align-top">
                <label for="total" id="total">0</label>
            </td>
            <td class="px-5 py-4 text-right align-top">
                <input type="number" class="form-control" name="price" id="price" placeholder="Precio Unitario">
            </td>
            <td class="px-5 py-4 text-right align-top">
                <input type="number" class="form-control" name="price" id="price" placeholder="Precio Unitario">
            </td>
        </tr>`);
        }
</script>

@endsection
