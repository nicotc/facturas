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
                        <li class="breadcrumb-item active"><a href="/client" >Listado de Clientes</a> </li>
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
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="nav-icon fas fa-receipt "></i>Proyecto</a>
                                </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <livewire:budget::budget :client="$contact->id" />
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



@section('js')

<script>
    $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    @php
        if(session('flash_notification', collect())->toArray() != null){
            $flash = session('flash_notification', collect())->toArray();
            $flash = $flash[0];
            $type = $flash['level'];
            $message = $flash['message'];
            switch ($type) {
                case 'success':
                @endphp
                    toastr.success("{{$message}}")
                @php
                break;
                case 'error':
                @endphp
                    toastr.error("{{$message}}")
                @php
                break;
            }
        }
    @endphp
  });

  var serviceinput
  var addressinput

  function funservice() {
    return serviceinput;
  }

window.livewire.on('serviceBudget', service => {
 serviceinput = service
});




        document.addEventListener('livewire:load', function () {
            let direcciones = [
                @foreach($contactAdddress as $Address)
                    { label: "{{ $Address->address }}", value: "{{ $Address->id }}" },
                @endforeach
            ];

            let servicios = [
                @foreach($services as $service)
                { label: "{{ $service->name }}", value: "{{ $service->id }}" },
                @endforeach
            ];

            VirtualSelect.init({
                ele: '#direcciones',
                options: direcciones,
                multiple: false,
                search: true,
            });

            VirtualSelect.init({
                ele: '#servicios',
                options: servicios,
                multiple: false,
                search: true,
            });

            VirtualSelect.init({
                ele: '#serviciosedit',
                options: servicios,
                multiple: false,
                search: true,
            });

                VirtualSelect.init({
                    ele: '#direccionesedit',
                    options: direcciones,
                    multiple: false,
                    search: true,
                });

            window.livewire.on('serviceBudget', service => {
                document.querySelector('#serviciosedit').setValue(service);
            });

            window.livewire.on('addressBudget', address => {
                document.querySelector('#direccionesedit').setValue(address);
            });



            let selectedAddress = document.querySelector('#direcciones')
            selectedAddress.addEventListener('change', () => {
                let data = selectedAddress.value
                let componente = $('#direcciones').data("component")
                window.livewire.find(componente).set('selectedAddress', data)
            })

            let selectedAddress2 = document.querySelector('#direccionesedit')
                selectedAddress2.addEventListener('change', () => {
                let data = selectedAddress2.value
                let componente = $('#direccionesedit').data("component")
                window.livewire.find(componente).set('selectedAddress', data)
            })


            let selectedServices = document.querySelector('#servicios')
            selectedServices.addEventListener('change', () => {
                let data = selectedServices.value
                let componente = $('#servicios').data("component")
                window.livewire.find(componente).set('selectedService', data)
            })

            let selectedServices2 = document.querySelector('#serviciosedit')
                selectedServices2.addEventListener('change', () => {
                let data = selectedServices2.value
                let componente = $('#serviciosedit').data("component")
                window.livewire.find(componente).set('selectedService', data)
                })

        })

    window.livewire.on('create', () => {
        $('#createBudget').modal('hide');
    })

    window.livewire.on('update', () => {
        $('#editBudget').modal('hide');
        })

    window.livewire.on('contactUpdated', () => {
        $('#EditClient').modal('hide');
        })



</script>
@endsection
