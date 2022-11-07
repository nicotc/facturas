<div wire:ignore.self class="modal fade" id="createextra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Extra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" wire:model="quantity"   class="form-control" id="quantity" placeholder="Ingrese una cantidad">
                    @error('quantity') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" wire:model="description"   class="form-control" id="description" placeholder="Ingrese una descripción">
                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="costo">Costo unitario base</label>
                    <input type="number" wire:model="costUnit"  class="form-control" id="costo"
                        placeholder="Ingrese el costo unitario Base">
                    @error('cost') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="costUnitProyectado">Costo total base: {{$total}}</label>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-lightblue close-modal"
                    data-dismiss="modal">Gruardar</button>
            </div>
        </div>
    </div>
</div>
