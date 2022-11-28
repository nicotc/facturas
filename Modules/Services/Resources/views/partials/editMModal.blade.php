<div wire:ignore.self class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar materiales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" id="description" wire:model="description">
                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="cost">Costo</label>
                    <input type="number" class="form-control" id="cost" wire:model="cost">
                    @error('cost') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="price">Precio de Venta</label>
                    <input type="number" class="form-control" id="price" wire:model="price">
                    @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="update()" class="btn btn-primary close-modal"
                    data-dismiss="modal">Gruardar</button>
            </div>
        </div>
    </div>
</div>
