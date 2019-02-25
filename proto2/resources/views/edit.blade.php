@extends ('layout')

@section('content')

<h2 class="title">This is edit page</h2>

<form method="POST" action="/user/{{Auth::user()->id}}" style="margin-bottom:1em">

@method('PATCH')

@csrf

    <div class="box" >

      <div class="field">

        <label class="label" for="username">username</label>

        <input class="input  {{$errors->has('username')? 'is-danger':''}}" name="username" id="username" value="{{Auth::user()->username}}"></input>

      </div>

      <div class="field">

        <label class="label" for="email">email</label>

        <input class="input  {{$errors->has('email')? 'is-danger':''}}" name="email" id="email" value="{{Auth::user()->email}}"></input>

      </div>

      <div class="field">

          <button class="button is-link" type="submit">update </button>

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

    </div>

</form>

<div class="field" >

<a class="button is-link" href="javascript:history.back()">Back</a>

</div>
@endsection
