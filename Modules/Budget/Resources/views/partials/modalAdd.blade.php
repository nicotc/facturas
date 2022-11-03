<div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Presupuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="address">Dirección de la obra
                    </label>
                    <select  wire:model="addressModel" name="address" id="address" class="select2">
                        <option value="">Seleccione una dirección</option>
                        @forelse ($addressModelArray as $itemKey => $itemValue)
                            <option value="{{ $itemKey }}">{{ $itemValue }}</option>
                        @endforeach
                    </select>
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="service">Tipo de servicio</label>
                    <select  wire:model="serviceModel" name="service" id="service" class="select2">
                        <option value="">Seleccione un servicio</option>
                        @forelse ($serviceModelArray as $itemKey => $itemValue)
                            <option value="{{ $itemKey }}">{{ $itemValue }}</option>
                        @endforeach
                    </select>

                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-indigo close-modal"
                    data-dismiss="modal">Gruardar</button>
            </div>
        </div>
    </div>
</div>
