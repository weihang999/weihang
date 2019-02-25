@extends('layout')

@section('content')
<h1 class="title">This is login page maybe </h1>

<form method="POST"  action="/login" style="margin-bottom:1em">

@csrf

  <div class="field">

    <label class="username" for="username">username</label>

    <input class="input {{$errors->has('username')? 'is-danger':''}}" type="username" name="username" ></input>

</div>

<div class="field" >
    <label class="label" for="password" >Password</label>

    <input class="input {{$errors->has('password')?'is-danger':''}}" type="password" name="password" ></input>
</div>

<div class="field">

  <div class="control">

    <button  class="button is-link " type="submit" >login</button>

  </div>

</div>

@if ($errors->any())

  <div class="notification is-danger">

    <ul>

      @foreach ($errors->all() as $error)

        <li>{{$error}} </li>

      @endforeach

    </ul>

    </div>

  @endif



@if (! empty($x))
<div class="box">
  {{$x['message']}}

</div>
@endif
</form>
@endsection
