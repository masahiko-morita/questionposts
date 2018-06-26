@extends('layouts.app')

@section('content')
<div class="search">
    <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'users.search', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('q', '', ['class' => 'form-control input-lg', 'placeholder' => 'キーワードを入力', 'size' => 40]) !!}
                    </div>
                    {!! Form::submit('ユーザーを検索', ['class' => 'btn btn-success btn-lg']) !!}
                {!! Form::close() !!}
            </div>
    </div>
</div>
@include('users.users', ['users' => $users])

@endsection
