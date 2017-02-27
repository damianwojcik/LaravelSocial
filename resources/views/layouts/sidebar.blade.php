<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            Profile
            @if($user->id === Auth::id())
                <a href="{{ url('/users/' . $user->id . '/edit') }}" class="pull-right"><small>Edit</small></a>
            @endif
        </div>

        <div class="panel-body text-center">
            <img class="img-responsive thumbnail" style="display: inline-block" src="{{ url('user-avatar/' . $user->id . '/250') }}" alt="{{ $user->firstName . ' ' . $user->lastName . ' Profile Picture' }}">
            <h2><a href="{{ url('/users/' . $user->id) }}">{{ $user->firstName . ' ' . $user->lastName }}</a></h2>
            <p>
                @if ($user->sex == 'male')
                    Male
                @else
                    Female
                @endif
            </p>
            <p>
                {{ $user->email }}
            </p>

            @if(Auth::check() && $user->id !== Auth::id())

                @if( !friendship($user->id)->exists && !has_friend_invite($user->id) )

                    <form action="{{ url('/friends/' . $user->id) }}" method="POST">

                        {{ csrf_field() }}
                        <button class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" style="padding-right: 5px;"></span>Add Friend</button>

                    </form>

                    @elseif (has_friend_invite($user->id))

                        <form action="{{ url('/friends/' . $user->id) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" style="padding-right: 5px;"></span>Accept invite</button>

                        </form>

                    @elseif (friendship($user->id)->exists && ! friendship($user->id)->accepted)

                        <button class="btn btn-default disabled">Request sent</button>

                    @elseif (friendship($user->id)->exists && friendship($user->id)->accepted)

                        <form action="{{ url('/friends/' . $user->id) }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger"><span class="glyphicon glyphicon-minus-sign" style="padding-right: 5px;"></span>Delete Friend</button>

                        </form>

                    @endif

                @endif

        </div>

    </div>
</div>