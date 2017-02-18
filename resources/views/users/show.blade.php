@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus earum est ex, labore maxime modi nemo neque nihil non officia optio praesentium temporibus voluptatem! Architecto ipsum maxime odio officia soluta.
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
