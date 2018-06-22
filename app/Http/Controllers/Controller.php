<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_questionposts = $user->questionposts()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_yes_questions = $user->yes_questions()->count();
        $count_no_questions = $user->no_questions()->count();

        return [
            'count_questionposts' => $count_questionposts,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_yes_questions' => $count_yes_questions,
            'count_no_questions' => $count_no_questions,
            
        ];
    }
}
