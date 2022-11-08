<div wire:ignore.self class="modal fade" id="ItemsEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Description">Descripción del item</label>
                    <textarea type="text" wire:model="description" class="form-control" id="Description"
                        placeholder="Ingrese la descripción del item" rows="6"></textarea>

                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" wire:model="quantity" class="form-control" id="quantity"
                        placeholder="Ingrese una cantidad">
                    @error('quantity') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn bg-navy">Actualizar</button>
            </div>
        </div>
    </div>
</div>
