<?php

use Modules\Contact\Entities\Contact;

function nombreproveedor($id){
    $contacto = Contact::where('id', $id)->first();
    return $contacto->name;
}
