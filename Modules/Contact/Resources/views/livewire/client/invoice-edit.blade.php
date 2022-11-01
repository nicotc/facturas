<div class="card card-success card-outline collapsed-card">
    <div class="card-header card-outline">
        <h3 class="card-title">Factura</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body box-profile">

        <h3 class="profile-username text-center">{{ $contact->FullName }}</h3>
        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Cedula/Rif</strong>
            <p class="text-muted">{{ $contactsClient->type }} - {{ $contactsClient->rif}} </p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Nombre </strong>
            <p class="text-muted">{{ $contactsClient->name }}</p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Telefono </strong>
            <p class="text-muted">{{ $contactsClient->phone }}</p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
            <p class="text-muted">{{ $contactsClient->email }}</p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
            <p class="text-muted">{{ $contactsClient->address }}</p>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-success btn-block"><i class="fas fa-edit"></i>Editar</button>
    </div>
</div>
