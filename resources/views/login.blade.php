@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Merchant Login at Criss Cross Computers</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('loginPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('memberID') ? ' has-error' : '' }}">
                            <label for="memberID" class="col-md-4 control-label">Member ID</label>

                            <div class="col-md-6">
                                <input id="memberID" type="text" class="form-control" name="memberID" value="{{ old('memberID') }}" required autofocus>

                                @if ($errors->has('memberID'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('memberID') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
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
