@extends('layouts.app')

@section('custom-css')
<style>
textarea {
resize: none;
}
</style>
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card callout callout-success">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <b>Nombre y apellido o razón social:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->name }}
                            </div>
                            <div class="col-3">
                                <b>Descripción del item:</b>
                            </div>
                            <div class="col-3">
                                {{ $budgetItems->description }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Domicilio fiscal:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->address }}
                            </div>
                            <div class="col-3">
                                <b>Cantidad:</b>
                            </div>
                            <div class="col-3">
                                {{ $budgetItems->quantity }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Teléfono:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->phone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Direccion de la obra</b>
                            </div>
                            <div class="col-3">
                                {{-- {{ $budget->contacts_address_id }} --}}
                                {{ $budget->AddressName }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Tipo de servicio:</b>
                            </div>
                            <div class="col-3">
                                {{-- {{ $budget->services_id }} --}}
                                {{ $budget->ServiceName }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @php
                            $budget_items_id = $budgetItems->id;
                        @endphp
                        <livewire:budget::budget.breakdown :budgetItems="$budget_items_id" />
                    </div>
                </div>
            </div>
        </div>
    </section>

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




</script>

@endsection
