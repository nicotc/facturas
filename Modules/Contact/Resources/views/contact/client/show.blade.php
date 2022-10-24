@extends('layouts.app')


@section('custom-css')


@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Contacto') }}</h1>
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
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline collapsed-card">
                            <div class="card-header card-outline">
                                <h3 class="card-title">Contacto</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <h2 class="text-center">Datos de Cliente</h2>
                                </div>
                                <h3 class="profile-username text-center">{{ $contact->FullName }}</h3>
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Email</strong>
                                    <p class="text-muted">{{ $contact->email }}</p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
                                    <p class="text-muted">{{ $contact->address }}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono casa</strong>
                                    <p class="text-muted">{{ $contact->phone_home }}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono Celular</strong>
                                    <p class="text-muted">{{ $contact->phone_mobile }}</p>
                                    <hr>
                                    <strong><i class="far fa-file-alt mr-1"></i> Notas</strong>
                                    <p class="text-muted">{{ $contact->notes }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary btn-block"><i class="fas fa-edit"></i>Editar</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-success card-outline collapsed-card">
                            <div class="card-header card-outline">
                                <h3 class="card-title">Factura</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center">{{ $contact->FullName }}</h3>
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Cedula/Rif</strong>
                                    <p class="text-muted">{{ $contactsClient->type }} - {{ $contactsClient->rif}} </p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Nombre </strong>
                                    <p class="text-muted">{{ $contactsClient->name }}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono </strong>
                                    <p class="text-muted">{{ $contactsClient->phone }}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                                    <p class="text-muted">{{ $contactsClient->email }}</p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
                                    <p class="text-muted">{{ $contactsClient->address }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-success btn-block"><i class="fas fa-edit"></i>Editar</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-warning card-outline collapsed-card">
                                <div class="card-header card-outline">
                                <h3 class="card-title">Direcciones</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body box-profile">


                                <div class="card-body direct-chat-messages">

                                    @forelse ($contactAdddress as $Adddress )
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
                                        <p class="text-muted">{{ $Adddress->address }}</p>
                                        <hr>
                                    @empty
                                        no tienes direcciones asociadas
                                    @endforelse

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-warning btn-block"><i class="fas fa-edit"></i>Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                     <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Presupuesto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Facturas</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <livewire:contact::contact.client />
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <livewire:contact::contact.client />
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>

        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection



