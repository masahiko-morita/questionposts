<?php

namespace App\Http\Controllers;

use Request;

use App\Question;

use App\User;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function questionpostsearch(){
    	
	$query = Request::get('q');

	if ($query) {
		$questionposts = Question::where('content', 'LIKE', "%$query%")->paginate(10);
	}else{
		$questionposts = null;
		$questionposts = array();
	}

	return view('questionposts.search',
	['questionposts' => $questionposts,
	]);
    }
    
    public function usersearch(){
	$query = Request::get('q');

	if ($query) {
		$users = User::where('name', 'LIKE', "%$query%")->paginate(10);
	}else{
		$users = null;
	}

	return view('users.search',
	['users' => $users,
	]);
    }
}
