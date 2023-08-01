@extends('layouts.app')

@push('style')
<link rel="stylesheet" href="/chat.css">
@endpush

@section('content')
<div class="chat">

    <!-- Header -->
    <div class="top">
      <img src="{{asset('storage/uploads/user/'.Auth::user()->picture)}}" alt="Avatar" class="img-fluid" style="width:50px;height:50px">
      <div>
        <p>{{Auth::user()->name}}</p>
        <small>Online</small>
      </div>
    </div>
    <!-- End Header -->
  
    <!-- Chat -->
    <div class="messages">
      @include('receive', ['message' => "Hey! What's up!  👋"])
      @include('receive', ['message' => "How are you?"])
    </div>
    <!-- End Chat -->
  
    <!-- Footer -->
    <div class="bottom">
      <form>
        <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
        <button type="submit"></button>
      </form>
    </div>
    <!-- End Footer -->
  </div>

 
@endsection

