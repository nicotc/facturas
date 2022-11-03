<?php

namespace Modules\Budget\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Budget\Entities\Budget;
use Modules\Contact\Entities\Contact;
use Modules\Services\Entities\Service;
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
        // return view('budget::budget.budget_breakdowns', compact('contactClient', 'budget'));
    }

    public function showBreakdown($id)
    {
        $budget = Budget::find($id);
        $contactClient = ContactsClient::find($budget->contacts_id);
        return view('budget::breakdown', compact('contactClient', 'budget'));
    }
}