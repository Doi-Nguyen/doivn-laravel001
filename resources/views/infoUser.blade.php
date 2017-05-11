@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Base Infomation</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{url('/home/info')}}">
                            {{csrf_field()}}

                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{Auth::user()->address}}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('birthday') ? 'has-error' : ''}}">
                                <label for="birthday" class="col-md-4 control-label">Birthday</label>
                                <div class="col-md-6">
                                    <input id="birthday" type="date" name="birthday" class="form-control" value="{{Auth::user()->birthday}}">
                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('slogan') ? 'has-error' : ''}}">
                                <label for="slogan" class="col-md-4 control-label">Slogan</label>
                                <div class="col-md-6">
                                    <input id="slogan" type="text" class="form-control" name="slogan" value="{{Auth::user()->slogan}}">

                                    @if ($errors->has('slogan'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('slogan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>
                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-1">
                                        <label class="radio-inline">
                                            <input name="gender" id="input-gender-male" value="male" type="radio"
                                                   @if(Auth::user()->gender == 'male')checked
                                                    @endif
                                            >
                                            Male
                                        </label>
                                    </div>

                                    <div class="col-md-2 col-md-offset-1">
                                        <label class="radio-inline">
                                            <input name="gender" id="input-gender-female" value="female" type="radio"
                                                   @if(Auth::user()->gender == 'female')checked
                                                    @endif
                                            >
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection