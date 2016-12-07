@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Merchant Registration at Criss Cross Computers</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('registerPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}">
                            <label for="companyName" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input id="companyName" type="text" class="form-control" name="companyName" value="{{ old('companyName') }}" required autofocus>

                                @if ($errors->has('companyName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('companyType') ? ' has-error' : '' }}">
                            <label for="companyType" class="col-md-4 control-label">Company Type</label>

                            <div class="col-md-6">
                                
                                <select id="companyType" type="text" class="form-control" name="companyType" value="{{ old('companyType') }}" required>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Online Shopping">Online Shopping</option>
                                    <option value="Educational Institution">Educational Institution</option>
                                    <option value="Non-Profit Organization">Non-Profit Organization</option>
                                    <option value="Others">Others</option>
                                </select>

                                @if ($errors->has('companyType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('companyAddress') ? ' has-error' : '' }}">
                            <label for="companyAddress" class="col-md-4 control-label">Company Address</label>

                            <div class="col-md-6">
                                <input id="companyAddress" type="text" class="form-control" name="companyAddress" value="{{ old('companyAddress') }}" required autofocus>

                                @if ($errors->has('companyAddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contactPerson') ? ' has-error' : '' }}">
                            <label for="contactPerson" class="col-md-4 control-label">Contact Person</label>

                            <div class="col-md-6">
                                <input id="contactPerson" type="text" class="form-control" name="contactPerson" value="{{ old('contactPerson') }}" required autofocus>

                                @if ($errors->has('contactPerson'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactPerson') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contactDesignation') ? ' has-error' : '' }}">
                            <label for="contactDesignation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="contactDesignation" type="text" class="form-control" name="contactDesignation" value="{{ old('contactDesignation') }}" required autofocus>

                                @if ($errors->has('contactDesignation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactDesignation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bankAccountTitle') ? ' has-error' : '' }}">
                            <label for="bankAccountTitle" class="col-md-4 control-label">Bank Account Name/Title</label>

                            <div class="col-md-6">
                                <input id="bankAccountTitle" type="text" class="form-control" name="bankAccountTitle" value="{{ old('bankAccountTitle') }}" required autofocus>

                                @if ($errors->has('bankAccountTitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bankAccountTitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bankAccountNumber') ? ' has-error' : '' }}">
                            <label for="bankAccountNumber" class="col-md-4 control-label">Account#</label>

                            <div class="col-md-6">
                                <input id="bankAccountNumber" type="text" class="form-control" name="bankAccountNumber" value="{{ old('bankAccountNumber') }}" required autofocus>

                                @if ($errors->has('bankAccountNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bankAccountNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bankName') ? ' has-error' : '' }}">
                            <label for="bankName" class="col-md-4 control-label">Bank Name</label>

                            <div class="col-md-6">
                                <input id="bankName" type="text" class="form-control" name="bankName" value="{{ old('bankName') }}" required autofocus>

                                @if ($errors->has('bankName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch') ? ' has-error' : '' }}">
                            <label for="branch" class="col-md-4 control-label">Branch</label>

                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control" name="branch" value="{{ old('branch') }}" required autofocus>

                                @if ($errors->has('branch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch') }}</strong>
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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
