<?php

namespace App\Http\Controllers;

use Request;

use App\User;
use App\Question;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $questionposts = $user->questionposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'questionposts' => $questionposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function yes_questions($id)
    {
        $user = User::find($id);
        $yes_questions = $user->yes_questions()->paginate(10);

        $data = [
            'user' => $user,
            'yes_questions' => $yes_questions,
        ];

        $data += $this->counts($user);

        return view('users.yes_questions', $data);
    }
    
    public function no_questions($id)
    {
        $user = User::find($id);
        $no_questions = $user->no_questions()->paginate(10);

        $data = [
            'user' => $user,
            'no_questions' => $no_questions,
        ];

        $data += $this->counts($user);

        return view('users.no_questions', $data);
    }
    
    public function search(){
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
