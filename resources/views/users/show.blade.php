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
            @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'questionposts.store']) !!}
                      <div class="form-group">
                          <h3>気になる質問を投稿する</h3>
                          {!! Form::label('content', '質問内容:') !!}
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          
                          {!! Form::label('choice1', '選択肢一つ目:') !!}
                          {!! Form::textarea('choice1', old('choice1'), ['class' => 'form-control', 'rows' => '1']) !!}
                          
                          {!! Form::label('choice2', '選択肢二つ目:') !!}
                          {!! Form::textarea('choice2', old('choice2'), ['class' => 'form-control', 'rows' => '1']) !!}
                          {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($questionposts) > 0)
                @include('questionposts.questionposts', ['questionposts' => $questionposts])
            @endif
        </div>
    </div>
@endsection