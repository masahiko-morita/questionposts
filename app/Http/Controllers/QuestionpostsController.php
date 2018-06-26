<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Question;

class QuestionpostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questionposts = $user->feed_questionposts()->orderBy('created_at', 'desc')->paginate(5);

            $data = [
                'user' => $user,
                'questionposts' => $questionposts,
            ];
        }
        return view('welcome', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->questionposts()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    public function show($id)
    {
      $questionpost = Question::find($id);
      $yes_users = $questionpost->yes_users;
      $no_users = $questionpost->no_users;

      $data = [
            'questionpost' => $questionpost,
            'yes_users' => $yes_users,
            'no_users' => $no_users,
            
        ];

        $data += $this->count($questionpost);

        return view('questionposts.show', $data);
    }
    
    public function destroy($id)
    {
        $questionpost = \App\Question::find($id);

        if (\Auth::id() === $questionpost->user_id) {
            $questionpost->delete();
        }

        return redirect()->back();
    }
    
    public function search(){
	$query = Request::get('q');

	if ($query) {
		$questionposts = Question::where('content', 'LIKE', "%$query%")->paginate(10);
	}else{
		$questionposts = null;
	}

	return view('questionposts.search',
	['questionposts' => $questionposts,
	]);
    }
}
