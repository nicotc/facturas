<div wire:ignore.self  class="modal fade" id="editBudget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="exampleModalLabel">Editar Presupuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="address">Dirección de la obra</label>
                    <div data-component="{{ $this->id }}"  id="direccionesedit" wire:ignore  ></div>
                    @error('direcciones') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="address">Servicios</label>
                    <div data-component="{{ $this->id }}" id="serviciosedit" wire:ignore></div>
                    @error('servicios') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="edit()" class="btn bg-indigo">Actualizar</button>
            </div>
        </div>
    </div>




</div>
