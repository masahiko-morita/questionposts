@if (Auth::user()->is_yesing($questionpost->id))
         <p>投票ありがとうございました</p>
@else
        {!! Form::open(['route' => ['user.yes', $questionpost->id]]) !!}
            {!! Form::submit('YES', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
@endif