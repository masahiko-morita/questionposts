<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content','choice1','choice2','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    public function userss()
    {
        return $this->belongsToMany(User::class, 'user_question')->withTimestamps();
    }

    public function yes_users()
    {
        return $this->users();
    }
    
    public function no_users()
    {
        return $this->userss();
    }
    
    
}
