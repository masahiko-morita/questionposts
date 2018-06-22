<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','age','gender','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function questionposts()
    {
        return $this->hasMany(Question::class);
    }
    
    public function feed_questionposts()
    {
        $follow_user_ids = $this->followings()-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Question::whereIn('user_id', $follow_user_ids);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
   {
    // confirm if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->followings()->attach($userId);
        return true;
    }
}

    public function unfollow($userId)
{
    // confirming if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // stop following if following
        $this->followings()->detach($userId);
        return true;
    } else {
        // do nothing if not following
        return false;
    }
    }


    public function is_following($userId) {
    return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function yes_questions()
    {
        return $this->belongsToMany(Question::class, 'question_user', 'user_id', 'question_id')->withTimestamps();
    }
    
    public function yes($questionId)
    {
    // confirm if already following
    $exist = $this->is_yesing($questionId);
    
    if ($exist) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->yes_questions()->attach($questionId);
        return true;
    }
    }

    public function is_yesing($questionId) {
        return $this->yes_questions()->where('question_id', $questionId)->exists();
}
    public function no_questions()
    {
        return $this->belongsToMany(Question::class, 'user_question', 'user_id', 'question_id')->withTimestamps();
    }
    
    public function no($questionId)
    {
    // confirm if already following
    $exist = $this->is_noing($questionId);
    
    if ($exist) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->no_questions()->attach($questionId);
        return true;
    }
    }

    public function is_noing($questionId) {
        return $this->no_questions()->where('question_id', $questionId)->exists();
}
}    