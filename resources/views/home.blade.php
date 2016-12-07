@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <ul>
            <h3>Criss Cross Payments : {{ ucwords(Auth::user()->memberID) }}</h3><br>
            </ul>
                <div class="flex-center">
                    <div class="content">
                    <ul>
                        <div>Member ID           : {{ Auth::user()->memberID }}</div><br>

                        <div>Company Name        : {{ Auth::user()->companyName }}</div><br>

                        <div>Company Type        : {{ Auth::user()->companyType }}</div><br>

                        <div>Company Address     : {{ Auth::user()->companyAddress }}</div><br>

                        <div>Contact Person      : {{ Auth::user()->contactPerson }}</div><br>

                        <div>Contact Designation : {{ Auth::user()->contactDesignation }}</div><br>

                        <div>Mobile              : {{ Auth::user()->mobile }}</div><br>

                        <div>Email               : {{ Auth::user()->email }}</div><br>

                        <div>Bank Account Title  : {{ Auth::user()->bankAccountTitle }}</div><br>

                        <div>Bank Account Number : {{ Auth::user()->bankAccountNumber }}</div><br>

                        <div>Bank Name           : {{ Auth::user()->bankName }}</div><br>

                        <div>Branch              : {{ Auth::user()->branch }}</div><br>

                        <div>IP                  : {{ Auth::user()->ip }}</div><br>

                        <div>Active?             : {{ Auth::user()->active }}</div><br>
                    </ul>
                    </div>
                </div>
                <ul>
                <a  href="{{ url('edit') }}" class="btn btn-primary" role="button">Edit</a>
                </ul><br>
            </div>
        </div>
    </div>
</div>
@endsection
