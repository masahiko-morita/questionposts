@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                    <h3 class="panel-title">年齢：{{ $user->age }}歳</h3>
                　　<h3 class="panel-title">性別：{{ $user->gender }}</h3>
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_questionposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/yes_questions') ? 'active' : '' }}"><a href="{{ route('users.yes_questions', ['id' => $user->id]) }}">赤を押した質問 <span class="badge">{{ $count_yes_questions }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/no_questions') ? 'active' : '' }}"><a href="{{ route('users.no_questions', ['id' => $user->id]) }}">青を押した質問 <span class="badge">{{ $count_no_questions }}</span></a></li>
            </ul>
            @include('questionposts.questionposts', ['questionposts' => $yes_questions])
        </div>
    </div>
@endsection