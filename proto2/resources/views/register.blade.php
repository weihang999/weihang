@extends ('layout')

@section('content')

<h2 class="title">This is register page</h2>

  <form method="POST" action="/register" style="margin-bottom:1em" >

@csrf

    <div class="box">

      <div class="control">

        <label class="label" for="email" >email</label>

        <input type="email" class="input {{$errors->has('email')? 'is-danger':''}}" name="email" id="email" value='{{old('email')}}'>

       </input>

    </div>

    <div class="control" >

      <label class="label" for="username" >username</label>

      <input type="username" class="input {{$errors->has('username')?'is-danger':''}}" name='username' id='username' value='{{old('username')}}'>

      </input>

    </div>

    <div class="control">

      <label class="label" for="password" >password</label>

      <input type="password" class="input {{$errors->has('password')}} " name="password" id="password"  >

    </input>

  </div>

  <div class="control">

    <label class="label" for="password_confirm">password confirm</label>

    <input type="password" class="input {{$errors->has('password_confirm')}}" name="password_confirm" id="password_confirm" >

  </input>

</div>

<br>

<div class="field">

  <div class="control">

    <button type="submit" class="button is-link">register</button>

  </div>

</div>

</form>

@if ($errors->any())

  <div class="notification is-danger">

    <ul>

      @foreach ($errors->all() as $error)

        <li>{{$error}} </li>

      @endforeach

    </ul>

    </div>

  @endif

@endsection
