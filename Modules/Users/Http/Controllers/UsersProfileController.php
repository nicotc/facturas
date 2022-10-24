<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('users::profile.edit');
    }

}