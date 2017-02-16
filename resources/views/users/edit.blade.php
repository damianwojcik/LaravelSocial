@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit profile</div>
                    <div class="panel-body">
                        <form action="{{ url('/users/' . $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="firstName">First Name:</label>
                                        <input type="text" name="firstName" class="form-control" value="{{ $user->firstName }}" placeholder="First Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastName">Last Name:</label>
                                        <input type="text" name="lastName" class="form-control" value="{{ $user->lastName }}" placeholder="Last Name">
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

                                    <div class="form-group">
                                        <label for="email">E-mail Address:</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="E-mail">
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
