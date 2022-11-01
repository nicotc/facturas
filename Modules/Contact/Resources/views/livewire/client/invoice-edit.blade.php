<div>
    <div class="card card-success card-outline collapsed-card" wire:ignore.self>
        <div class="card-header card-outline">
            <h3 class="card-title">Factura</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body box-profile">
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Cedula/Rif</strong>
                <p class="text-muted">{{ $type }} - {{ $rif}} </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> / Razón social </strong>
                <p class="text-muted">{{ $name }}</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Teléfono </strong>
                <p class="text-muted">{{ $phone }}</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                <p class="text-muted">{{ $email }}</p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
                <p class="text-muted">{{ $address }}</p>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" wire:click="editId({{ $invoice_id }})" class="btn btn-success btn-block" data-toggle="modal"
                        data-target="#EditInvoice"><i class="fas fa-edit"></i>Editar
                    </button>
        </div>
    </div>



    <div wire:ignore.self class="modal fade" id="EditInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Editar los datos de facturación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type">Tipo de documento</label>
                        <select wire:model="type" class="form-control">
                            <option value="V">V</option>
                            <option value="E">E</option>
                            <option value="J">J</option>
                            <option value="G">G</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rif">Cedula/Rif</label>
                        <input wire:model="rif" type="text" class="form-control" id="rif" placeholder="Cedula/Rif">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre / Razón social</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input wire:model="address" type="text" class="form-control" id="address" placeholder="Direccion">
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" wire:click.prevent="update()" class="btn btn-success close-modal"
                        data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

</div>
