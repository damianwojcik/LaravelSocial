@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit profile</div>
                    <div class="panel-body">

                        <img class="img-responsive" src="{{ asset('storage/users/' . $user->id . '/avatars/' . $user->avatar) }}" alt="{{ $user->firstName . ' ' . $user->lastName }}">
                        
                        <form action="{{ url('/users/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                        <label for="avatar">Profile Photo:</label>
                                        <input type="file" name="avatar" class="form-control">

                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                        <label for="firstName">First Name:</label>
                                        <input type="text" name="firstName" class="form-control" value="{{ $errors->has('firstName') ? old('firstName') : $user->firstName }}" placeholder="First Name">
                                        @if ($errors->has('firstName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                        <label for="lastName">Last Name:</label>
                                        <input type="text" name="lastName" class="form-control" value="{{ $errors->has('lastName') ? old('lastName') : $user->lastName }}" placeholder="Last Name">
                                        @if ($errors->has('lastName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="sex">Sex:</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" id="inlineRadio1" value="male" required
                                                    @if($user->sex == 'male')
                                                        checked
                                                    @endif>Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" id="inlineRadio2" value="female" required
                                                    @if($user->sex == 'female')
                                                        checked
                                                    @endif>Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-mail Address:</label>
                                        <input type="email" name="email" class="form-control" value="{{ $errors->has('email') ? old('email') : $user->email }}" placeholder="E-mail">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
