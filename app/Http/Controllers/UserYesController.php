<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Question;

class UserYesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->yes($id);
        return redirect()->back();
    }
       
}
