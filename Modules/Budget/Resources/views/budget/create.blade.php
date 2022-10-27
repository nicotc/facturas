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
                        {{ Form::open(['route' => 'budget.store', 'method' => 'POST']) }}
                            <div class="row">
                                {{ Form::hidden("contacts_id", $_REQUEST['client']) }}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Descripcion">Descripcion</label>
                                        {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contacts_address_id">contacts_address_id</label>
                                        {{ Form::select('contacts_address_id', $contacts_address, null, ['class' => 'form-control']) }}

                                    </div>
                                </div>


                            </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




    </div>
</section>
@endsection


@section('js')



@endsection
