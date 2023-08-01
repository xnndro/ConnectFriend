@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-title">Hi, {{Auth::user()->name}}</h1>
                <p>This is your amount payment for using this app, please checkout and pay this</p>
                <h2>{{Auth::user()->price_regist}}</h2>

                <form action="{{route('session')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="orderID" value="{{Auth::user()->id}}">
                    <input type="hidden" name="total_price" value="{{Auth::user()->price_regist}}">
                    <button type="submit" class="btn btn-primary">Pay</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
