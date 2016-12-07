@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="flex-center position-ref full-height">
                    <div class="content">
                    <ul>
                       <h3>Criss Cross Payments : {{ ucwords(Auth::user()->memberID) }}</h3><br>
                       <h4>TX Details</h4>
                    </ul>
                    <ul>
                    <div width="100%" style="margin-right:40px">
                       <div class="table-responsive">
                            @if(!empty($transactions))
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Client</th>
                                            <th>Token</th>
                                            <th>TX ID</th> 
                                            <th>Amount</th>
                                            <th>Time</th> 
                                            <th>Status</th>
                                        </tr>
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td>Name : {{ $transaction->client_name }}<br>
                                                Email : {{ $transaction->client_email }} <br>
                                                Mobile : {{ $transaction->client_mobile }}</td>
                                                <td>{{ $transaction->token }}</td>
                                                <td>{{ $transaction->tx_id }}</td> 
                                                <td>{{ $transaction->tx_amount }}</td>
                                                <td>{{ $transaction->tx_time }}</td>
                                                <td>{{ $transaction->tx_status }}</td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                    
                            @endif
                        </div>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
