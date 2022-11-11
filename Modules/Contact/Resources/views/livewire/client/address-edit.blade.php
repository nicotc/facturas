<div>
    <div class="card card-warning card-outline collapsed-card" wire:ignore.self>
        <div class="card-header card-outline">
            <h3 class="card-title">Direcciones</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body box-profile" >
            <div class="card-body direct-chat-messages">
                @forelse ($arrAddress as $Adddress )
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
                 <button type="button" wire:click="editId({{ $Adddress->id }})" data-toggle="modal" data-target="#Editaddress" class="btn btn-warning" style="float: right">
                    <i class="fas fa-edit"></i></button>
                <p class="text-muted">{{ $Adddress->address }}</p>
                <hr>
                @empty
                no tienes direcciones asociadas
                @endforelse

            </div>
        </div>
        <div class="card-footer">
            <button type="button"  class="btn btn-warning btn-block" data-toggle="modal"
                data-target="#NewAddress"><i class="fas fa-plus"></i> Nueva Dirección</button>
        </div>
    </div>




    <div wire:ignore.self class="modal fade" id="NewAddress" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" wire:model="addressNEW" class="form-control" id="address" placeholder="Dirección">
                        @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" wire:click.prevent="newId({{ $caddress }})" class="btn btn-warning close-modal"
                        data-dismiss="modal">Nueva</button>
                </div>
            </div>
        </div>
    </div>




    <div wire:ignore.self class="modal fade" id="Editaddress" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" wire:model="address" class="form-control" id="address" placeholder="Dirección">
                        @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" wire:click.prevent="update()" class="btn btn-warning close-modal"
                        data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>







</div>
