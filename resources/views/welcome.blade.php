@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5">Find Your Friend Here</h2>
        </div>
        @foreach($user as $u)
        <div class="col-md-3">
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{asset('/storage/uploads/user/'.$u->picture)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$u->name}}</h5>
                    <p class="card-text">Hobby: {{$u->hobby}}</p>
                    <form action="{{route('wishlist')}}" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="friend_id" value="{{$u->id}}">
                        <button type="submit" class="btn btn-primary">Request Friend</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection