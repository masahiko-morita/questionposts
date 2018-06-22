@if (Auth::user()->is_noing($questionpost->id))
        <p>投票ありがとうございました</p>
@else
        {!! Form::open(['route' => ['user.no', $questionpost->id]]) !!}
            {!! Form::submit('No', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
@endif
