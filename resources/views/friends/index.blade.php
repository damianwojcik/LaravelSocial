@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">List of friends</div>

                    <div class="panel-body">

                        @if($friends->count() == 0)

                            <h4 class="text-center">Friends not found.</h4>

                        @endif

                        @foreach($friends as $user)
                            <div class="col-sm-4 text-center">

                                <a href="{{ url('/users/' . $user->id) }}">
                                    <div class="thumbnail">
                                        <img src="{{ url('user-avatar/'. $user->id . '/250') }}" alt="{{ $user->firstName . ' ' . $user->lastName . ' Profile Picture' }}" class="img-responsive">
                                        <h5>{{ $user->firstName . ' ' . $user->lastName }}</h5>
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
