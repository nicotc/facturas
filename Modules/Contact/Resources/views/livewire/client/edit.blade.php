<div>
<div class="card card-primary card-outline" wire:ignore.self>
    <div class="card-header card-outline">
        <h3 class="card-title">Contacto</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body box-profile">
        <div class="text-center">
            <h2 class="text-center">{{ $name }} {{ $last_name }}</h2>
        </div>

        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Email</strong>
            <p class="text-muted">{{ $email }}</p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
            <p class="text-muted">{{ $address }}</p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono casa</strong>
            <p class="text-muted">{{ $phone_home }}</p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono Celular</strong>
            <p class="text-muted">{{ $phone_mobile }}</p>
            <hr>
            <strong><i class="far fa-file-alt mr-1"></i> Notas</strong>
            <p class="text-muted">{{ $notes }}</p>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" wire:click="editId({{ $contact->id }})" class="btn btn-primary btn-block" data-toggle="modal"
            data-target="#EditClient"><i class="fas fa-edit"></i>Editar
        </button>

    </div>
</div>

<div wire:ignore.self class="modal fade" id="EditClient" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar los datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" id="last_name" wire:model="last_name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" id="address" wire:model="address">
                    @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="phone_home">Telefono casa</label>
                    <input type="text" class="form-control" id="phone_home" wire:model="phone_home">
                    @error('phone_home') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="phone_mobile">Telefono Celular</label>
                    <input type="text" class="form-control" id="phone_mobile" wire:model="phone_mobile">
                    @error('phone_mobile') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="notes">Notas</label>
                    <input type="text" class="form-control" id="notes" wire:model="notes">
                    @error('notes') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>
</div>

