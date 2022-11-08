<div wire:ignore.self class="modal fade" id="Desgloseedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="exampleModalLabel">Editar Desglose del Item</h5>
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
                    <label for="Material">Material</label>

                    <select wire:model="material" class="form-control" id="material" name="material">
                        <option value="">Seleccione un material</option>

                        @forelse ($materialArray as $materialKey => $materialValue)
                            <option value="{{ $materialKey }}">{{ $materialValue }}</option>
                        @empty
                            <option value="">No hay materiales</option>
                        @endforelse
                    </select>
                    @error('material') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="costo">Costo unitario base</label>
                    <input type="number" wire:model="costUnitBase"  class="form-control" name="costUnitBase" id="costo"
                        placeholder="Ingrese el costo unitario Base">
                    @error('costUnitBase') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="costUnitProyectado">Costo unitario Proyectado</label>
                    <input type="number" wire:model="costUnitProyectado" class="form-control" name="costUnitProyectado" id="costUnitProyectado" placeholder="Ingrese el costo Unutario proyectado">
                    @error('costUnitProyectado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                        <label for="costo">Base Total:{{ $CalBaseCantidad }}</label>
                </div>

                <div class="form-group">
                        <label for="costo">Costo Mano de obra: {{ $CalManoObra }}</label>
                </div>
                <div class="form-group">
                    <label for="costo">SubTotal Proyectado: {{$CalProyectadoCantidad }}</label>
                </div>

                <div class="form-group">
                        <label for="costo">Proyectado Total: {{$CalTotalProyectado }}</label>
                </div>



            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit" class="btn bg-navy">Editar</button>
            </div>
        </div>
    </div>
</div>
