@if (Auth::user()->is_yesing($questionpost->id) || Auth::user()->is_noing($questionpost->id))
         <p>投票ありがとうございました</p>
@else
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            {!! Form::open(['route' => ['user.yes', $questionpost->id]]) !!}
                 {!! Form::submit('YES', ['class' => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>    
        <div class="btn-group" role="group">    
            {!! Form::open(['route' => ['user.no', $questionpost->id]]) !!}
                 {!! Form::submit('NO', ['class' => "btn btn-danger"]) !!}
            {!! Form::close() !!}
        </div>
    </div>    
@endif
