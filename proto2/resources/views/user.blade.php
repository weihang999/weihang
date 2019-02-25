@extends('layout')

@section('content')

<p class='title'>Welcome here u bitch </p>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
@if (isset(Auth::user()->username))
<div class="box">

  <p class="text">{{Auth::user()->username}}</p>

<p class="text">{{Auth::user()->email}}</p>

<a href='/user/{Auth::user()->id}/edit'>edit</a>
<br>

<a href="/logout">logout</a>

</div>
@endif


@endsection
