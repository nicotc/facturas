<?php

namespace Modules\Budget\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Budget\Entities\Budget;
use Modules\Contact\Entities\Contact;
use Modules\Services\Entities\Service;
use Illuminate\Contracts\Support\Renderable;
use Modules\Budget\Entities\BudgetItems;
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
}