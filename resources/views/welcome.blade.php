@extends('layouts.app')

@section('content')
   @if (Auth::check())
        <div class="row">
            <aside class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $user->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-xs-8">
                @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'questionposts.store']) !!}
                      <div class="form-group">
                          <h3>気になる質問を投稿する</h3>
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
                @endif
                @if (count($questionposts) > 0)
                    @include('questionposts.questionposts', ['questionposts' => $questionposts])
                @endif
            </div>
        </div>
   @else    
   @section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>これってありかなしか知りたくない？</h1>
                <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">QuestionPostsを始める</a>
            </div>
        </div>
    </div>
    @endsection    
   @endif
@endsection
