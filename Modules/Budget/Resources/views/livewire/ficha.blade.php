<div>
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
                                <b>Codigo Proyecto:</b>
                            </div>
                            <div class="col-3">
                                {{ $budget->correlative }}
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
                                <b>Total Costo Proyectado</b>
                            </div>
                            <div class="col-3">
                                 USD {{ $costo }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Teléfono:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->phone }}
                            </div>
                            <div class="col-3">
                                <b>Total Presupuestado</b>
                            </div>
                            <div class="col-3">
                                <b>Total Presupuestado</b>
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
                            <div class="col-3">
                                <b>Total Pagado</b>
                            </div>
                            <div class="col-3">
                                <b>Total Pagado</b>
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
