<div wire:ignore.self class="modal fade" id="modalEditProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar producto para el inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Proveedor</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Nombre de cliente</label>
                        <input type="text" class="form-control" id="last_name" wire:model="last_name">
                        @error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Genero</label>
                        <input type="text" class="form-control" id="gender" wire:model="gender">
                        @error('gender') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" wire:model="email">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_home">Teléfono casa</label>
                        <input type="text" class="form-control" id="phone_home" wire:model="phone_home">
                        @error('phone_home') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_home">Teléfono celular</label>
                        <input type="text" class="form-control" id="phone_mobile" wire:model="phone_mobile">
                        @error('phone_mobile') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" wire:model="address">
                        @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="notes">Notas</label>
                        <input type="text" class="form-control" id="notes" wire:model="notes">
                        @error('notes') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn btn-primary close-modal"
                    data-dismiss="modal">Gruardar</button>
            </div>
        </div>
    </div>
</div>
