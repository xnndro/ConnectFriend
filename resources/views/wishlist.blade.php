@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="heading-section mb-5">Your Friends</h2>
        </div>
        @foreach($user as $u)
        <div class="col-md-3">
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{asset('/storage/uploads/user/'.$u->friend->picture)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$u->friend->name}}</h5>
                    <p class="card-text">Hobby: {{$u->friend->hobby}}</p>
                <form action="{{route('listfriend.destroy',$u->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Unfriend</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection