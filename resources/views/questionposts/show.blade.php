@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="questionpost">
                <div class="panel panel-default">
                        <p class="item-title">{{ $questionpost->content }}</p>
                        <div class="buttons text-center">
                            @if (Auth::check())
                                @include('user_yes.yes_button', ['questionpost' => $questionpost])
                                @include('user_no.no_button', ['questionpost' => $questionpost])
                            @endif
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="yes-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Yesしたユーザ<span class="badge">{{ $count_yes_users }}</span></a></li>
                    </div>
                    <div class="panel-body">
                        @foreach ($yes_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="no-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Noしたユーザ<span class="badge">{{ $count_no_users }}</span></a></li>
                    </div>
                    <div class="panel-body">
                        @foreach ($no_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection