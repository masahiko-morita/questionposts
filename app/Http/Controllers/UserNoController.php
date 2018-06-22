<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNoController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->no($id);
        return redirect()->back();
    }
}
