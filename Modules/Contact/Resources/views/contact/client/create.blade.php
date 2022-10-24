@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Crear un Cliente') }}</h1>
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
                {{ Form::open(array('route' => 'client.store')) }}
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <h4>{{ __('Datos del Cliente') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">{{ __('Nombre') }}</label>
                                        {{ Form::text('name', null, ['class' => 'form-control', 'id'=>"name"]) }}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Apellido') }}</label>
                                        {{ Form::text('last_name', null, ['class' => 'form-control', 'id'=>"last_name"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Genero') }}</label>
                                        {{ Form::select('gender', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class'=>"form-control"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                            {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'id'=>'email']) !!}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Telefono Local') }}</label>
                                        {{ Form::text('phone_home', null, ['class' => 'form-control', 'id'=>"phone_home"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Telefono Celular') }}</label>
                                        {{ Form::text('phone_mobile', null, ['class' => 'form-control', 'id'=>"phone_mobile"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Direccion') }}</label>
                                        {{ Form::text('address', null, ['class' => 'form-control', 'id'=>"address"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Notas') }}</label>
                                        {{ Form::textarea('notes', null, ['class' => 'form-control', 'id'=>"notes"]) }}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <h4>{{ __('Datos Factura') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="Rif">{{ __('Cedula / Rif') }}</label>
                                        <div class="row">
                                            <div class="col-2">
                                                {{ Form::select('rif_type', ['V' => 'V', 'E' => 'E', 'J' => 'J', 'G' => 'G'], null, ['class'=>"form-control"]) }}
                                            </div>
                                            <div class="col-10">
                                                {{ Form::text('rif', null, ['class' => 'form-control', 'id'=>"rif"]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="last_name">Nombre / Empresa</label> <samp class="text-primary" onclick="copiarempresa()">copiar</samp>
                                        {{ Form::text('company_name', null, ['class' => 'form-control', 'id'=>"company_name"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Telefono</label> <samp class="text-primary" onclick="copiarphone()">copiar</samp>
                                        {{ Form::text('company_phone', null, ['class' => 'form-control', 'id'=>"company_phone"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Email</label> <samp class="text-primary" onclick="copiaremail()">copiar</samp>
                                        {{ Form::text('company_email', null, ['class' => 'form-control', 'id'=>"company_email"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Direccion de facturacion') }}</label><samp class="text-primary" onclick="copiardireccion()">copiar</samp>
                                        {{ Form::text('company_address', null, ['class' => 'form-control', 'id'=>"company_address"]) }}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <h4>{{ __('Direccion de la obra') }}</h4>
                            </div>
                           <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Direccion de obra') }}</label> <samp class="text-primary" onclick="copiardireccion2()">copiar</samp>
                                        {{ Form::text('work_address', null, ['class' => 'form-control', 'id'=>"work_address"]) }}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        <a class="btn btn-secondary" href="{!! URL::previous() !!}" >{{ __('cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        function copiarempresa() {
            var nombre = document.getElementById("name").value;
            var apellido = document.getElementById("last_name").value;
            var empresa = nombre + " " + apellido;
            document.getElementById("company_name").value = empresa;
        }
        function copiardireccion() {
            var direccion = document.getElementById("address").value;
            document.getElementById("company_address").value = direccion;
        }
        function copiardireccion2() {
            var direccion = document.getElementById("address").value;
            document.getElementById("work_address").value = direccion;
        }
        function copiarphone() {
            var phone = document.getElementById("phone_home").value;
            document.getElementById("company_phone").value = phone;
        }
        function copiaremail() {
            var email = document.getElementById("email").value;
            document.getElementById("company_email").value = email;
        }
    </script>
@endsection

