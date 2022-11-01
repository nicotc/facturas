@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="nav-icon fas fa-address-book text-info"></i> {{ __('Crear un Cliente') }}</h1>
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
                {{ Form::open(array('route' => 'client.store', "autocomplete"=>"off")) }}
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
                                        {{ Form::text('name', null, ['class' => 'form-control', 'id'=>"name", "autocomplete"=>"off"]) }}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Apellido') }}</label>
                                        {{ Form::text('last_name', null, ['class' => 'form-control', 'id'=>"last_name", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Género') }}</label>
                                        {{ Form::select('gender', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class'=>"form-control" , "autocomplete"=>"off" ]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                            {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'id'=>'email' , "autocomplete"=>"off"]) !!}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Teléfono Local') }}</label>
                                        {{ Form::text('phone_home', null, ['class' => 'form-control', 'id'=>"phone_home" , "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Teléfono Celular') }}</label>
                                        {{ Form::text('phone_mobile', null, ['class' => 'form-control', 'id'=>"phone_mobile" , "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Dirección') }}</label>
                                        {{ Form::text('address', null, ['class' => 'form-control', 'id'=>"address" , "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Comentarios') }} </label><span> Comentarios o notas sobre el cliete</span>
                                        {{ Form::textarea('notes', null, ['class' => 'form-control', 'id'=>"notes" , "autocomplete"=>"off" ]) }}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <h4>{{ __('Datos Factura') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="Rif">{{ __('Cédula / Rif') }}</label>
                                        <div class="row">
                                            <div class="col-2">
                                                {{ Form::select('rif_type', ['V' => 'V', 'E' => 'E', 'J' => 'J', 'G' => 'G'], null, ['class'=>"form-control" , "autocomplete"=>"off"]) }}
                                            </div>
                                            <div class="col-10">
                                                {{ Form::text('rif', null, ['class' => 'form-control', 'id'=>"rif", "autocomplete"=>"off"]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="last_name">Nombre / Empresa </label> <samp class="text-primary" onclick="copiarempresa()"> copiar</samp>
                                        {{ Form::text('company_name', null, ['class' => 'form-control', 'id'=>"company_name", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Teléfono </label> <samp class="text-primary" onclick="copiarphone()"> copiar</samp>
                                        {{ Form::text('company_phone', null, ['class' => 'form-control', 'id'=>"company_phone", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Email </label> <samp class="text-primary" onclick="copiaremail()"> copiar</samp>
                                        {{ Form::text('company_email', null, ['class' => 'form-control', 'id'=>"company_email", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Dirección de facturacion') }} </label><samp class="text-primary" onclick="copiardireccion()"> copiar</samp>
                                        {{ Form::text('company_address', null, ['class' => 'form-control', 'id'=>"company_address", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <h4>{{ __('Dirección de la obra') }}</h4>
                            </div>
                           <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Dirección de obra') }} </label> <samp class="text-primary" onclick="copiardireccion2()"> copiar</samp>
                                        {{ Form::text('work_address', null, ['class' => 'form-control', 'id'=>"work_address", "autocomplete"=>"off"]) }}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                        <a class="btn btn-secondary" href="{!! URL::previous() !!}" >{{ __('Cancelar') }}</a>
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

        // $('#EditClient').modal({backdrop: 'static', keyboard: false})

    </script>
@endsection

