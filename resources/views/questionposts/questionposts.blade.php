<ul class="media-list">
@foreach ($questionposts as $questionpost)
    <?php $user = $questionpost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $questionpost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($questionpost->content)) !!}</p>
            </div>
            <div>
                @include('user_yes.yes_button', ['questionpost' => $questionpost])
                @include('user_no.no_button', ['questionpost' => $questionpost])
                
                @if (Auth::id() == $questionpost->user_id)
                    {!! Form::open(['route' => ['questionposts.destroy', $questionpost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $questionposts->render() !!}