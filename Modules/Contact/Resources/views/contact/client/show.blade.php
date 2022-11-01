@extends('layouts.app')


@section('custom-css')


@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-book text-info"></i> {{ __('Detalle de cliente') }}</h1>
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
                        <livewire:contact::client.edit :contact="$contact" />

                    </div>

                    <div class="col-md-12">
                        <livewire:contact::client.invoice-edit :invoice="$contactsInvoice" />
                    </div>

                    <div class="col-md-12">
                        <livewire:contact::client.address-edit :caddress="$contact->id" />
                    </div>
                </div>
                <div class="col-md-9">
                     <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs ">
              <div class="card-header p-0 pt-1 bg-indigo">
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


                    <livewire:budget::budget :client="$contact->id" />
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <livewire:budget::budget />
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



