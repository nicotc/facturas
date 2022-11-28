<?php

namespace Modules\Budget\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Modules\Budget\Entities\Abono;
use Modules\Budget\Entities\Gasto;
use Modules\Budget\Entities\Budget;
use Modules\Contact\Entities\Contact;
use Modules\Services\Entities\Service;
use Modules\Budget\Entities\BudgetItems;
use Modules\Budget\Entities\Presupuesto;
use Illuminate\Contracts\Support\Renderable;
use Modules\Contact\Entities\ContactAddress;
use Modules\Contact\Entities\ContactsClient;
use Modules\Budget\Http\Requests\CreateBudgetRequest;

class BudgetController extends Controller
{
    public function index()
    {
        return view('budget::index');
    }


    public function showItems($id)
    {
        $budget = Budget::find($id);
        $contactClient = ContactsClient::find($budget->contacts_id);
        return view('budget::items', compact('contactClient', 'budget'));
    }

    public function showBreakdown($id)
    {
        $budgetItems = BudgetItems::find($id);
        $budget = Budget::find($budgetItems->budgets_id);
        $contactClient = ContactsClient::find($budget->contacts_id);

        return view('budget::breakdowns', compact('budgetItems', 'contactClient', 'budget'));
    }

    public function print($id)
    {


        $budget = Budget::where('correlative', $id)->first();
        $services = Service::where('id', $budget->services_id)->first();
        $contactClient = ContactsClient::find($budget->contacts_id);
        $budgetItems = Presupuesto::where('numero_orden', $id)->get();

        // dd($budgetItems);

        $pdf = Pdf::loadView('budget::pdf.budget', compact('budget', 'contactClient', 'budgetItems', 'services'));

        return $pdf->stream('archivo.pdf');


        // return $pdf->download('itsolutionstuff.pdf');

    }


    public function abono($id)
    {

        $abono = Abono::find($id);
        $abonos = Abono::where('numero_orden', $abono->numero_orden)
                        ->where('created_at', '<', $abono->created_at)->get();
         $budget = Budget::where('correlative', $abono->numero_orden)->first();
         $services = Service::where('id', $budget->services_id)->first();
         $contactClient = ContactsClient::find($budget->contacts_id);
         $presupuesto = Presupuesto::where('numero_orden', $abono->numero_orden)->sum('total');

         $pdf = Pdf::loadView('budget::pdf.abono', compact('budget', 'contactClient',  'services',  'presupuesto', 'abono', 'abonos'));

         return $pdf->stream('archivo.pdf');


        // return $pdf->download('itsolutionstuff.pdf');

    }


    public function gastos($id)
    {
        $budget = Budget::where('correlative', $id)->first();
        $services = Service::where('id', $budget->services_id)->first();
        $contactClient = ContactsClient::find($budget->contacts_id);
        $gastos = Gasto::where('numero_orden', $id)->get();
        $presupuesto = Presupuesto::where('numero_orden',$id)->sum('total');
        $pdf = Pdf::loadView('budget::pdf.gastos', compact('budget', 'contactClient',  'services',  'gastos', 'presupuesto'));

        return $pdf->stream('archivo.pdf');

    }
    public function portada($id)
    {
        $budget = Budget::where('correlative', $id)->first();
        $services = Service::where('id', $budget->services_id)->first();
        $contactClient = ContactsClient::find($budget->contacts_id);
        $gastos = Gasto::where('numero_orden', $id)->sum('total');
        $presupuesto = Presupuesto::where('numero_orden', $id)->sum('total');
        $pdf = Pdf::loadView('budget::pdf.portada', compact('budget', 'contactClient',  'services',  'gastos', 'presupuesto'));
        return $pdf->stream('archivo.pdf');
    }

    public function factura(){

        $pdf = Pdf::loadView('budget::pdf.factura');
        return $pdf->stream('archivo.pdf');
    }

}