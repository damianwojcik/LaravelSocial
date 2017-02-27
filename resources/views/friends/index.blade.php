@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of friends
                        <span class="label label-primary">{{ $user->friends()->count() }}</span>
                    </div>

                    <div class="panel-body">

                        @if($user->friends()->count() == 0)

                            <h4 class="text-center">Friends not found.</h4>

                        @endif

                        @foreach($user->friends() as $friend)
                            <div class="col-sm-4 text-center">

                                <a href="{{ url('/users/' . $friend->id) }}">
                                    <div class="thumbnail">
                                        <img src="{{ url('user-avatar/'. $friend->id . '/250') }}" alt="{{ $friend->firstName . ' ' . $friend->lastName . ' Profile Picture' }}" class="img-responsive">
                                        <h5>{{ $friend->firstName . ' ' . $friend->lastName }}</h5>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
