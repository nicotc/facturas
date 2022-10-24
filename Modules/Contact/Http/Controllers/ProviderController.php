<?php

namespace Modules\Contact\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;
use Illuminate\Contracts\Support\Renderable;
use Modules\Contact\Entities\ContactAddress;
use Modules\Contact\Entities\ContactsClient;
use Modules\Contact\Http\Requests\ContactStoreRequest;
use Modules\Contact\Transformers\ContactStoreResource;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('contact::provider');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('contact::contact.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ContactStoreRequest $request)
    {
        $input = $request->all();
        $contact = Contact::create($input);
        $contactsClient = ContactsClient::create(
            [
                'contact_id' => $contact->id,
                'type' => $input['rif_type'],
                'rif' => $input['rif'],
                'name' => $input['company_name'],
                'phone' => $input['company_phone'],
                'email' => $input['company_email'],
                'address' => $input['company_address'],
            ]
        );
        $contactAdddress = ContactAddress::create(
            [
                'contact_id' => $contact->id,
                'address' => $input['work_address'],
            ]
        );
        Flash::success('Cliente guardado correctamente.');
        return view('contact::index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contactsClient = ContactsClient::where('contact_id', $id)->first();
        $contactAdddress = ContactAddress::where('contact_id', $id)->get();
        return view('contact::contact.show', [
            'contact'=>$contact,
            'contactsClient'=>$contactsClient,
            'contactAdddress'=>$contactAdddress,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contact::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
