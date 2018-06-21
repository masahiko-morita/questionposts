<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class QuestionpostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questionposts = $user->feed_questionposts()->orderBy('created_at', 'desc')->paginate(10);

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
    
    public function destroy($id)
    {
        $questionpost = \App\Question::find($id);

        if (\Auth::id() === $questionpost->user_id) {
            $questionpost->delete();
        }

        return redirect()->back();
    }
}
