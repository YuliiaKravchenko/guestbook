@extends('layouts.layout') @section('content')

<form class="form-signin" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2 class="form-signin-heading">Wellcome to Guestbook</h2>

    <label for="inputName" class="sr-only">Name</label>
    <input name="username" type="text" id="inputName" class="form-control" placeholder="Name" value="{{old('username')}}" required autofocus>
    <br>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" value="{{old('email')}}" required autofocus>
    <br>
    <label for="inputUrl" class="sr-only">Url</label>
    <input name="url" type="text" id="inputUrl" class="form-control" placeholder="Url" value="{{old('url')}}" >
    <br>
    <label for="inputAvatar" class="sr-only">Avatar</label>
    <input name="img" type="file" id="inputAvatar" class="form-control" placeholder="Url">
    <br>
    <label for="inputMsg" class="sr-only">Message</label>
    <textarea name="msg" cols="30" class="form-control" required id="inputMsg">{{old('msg')}}</textarea>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>
    <br> @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif($success)
    <div class="alert alert-success">
        <ul>
            {{$success}}
        </ul>
    </div>
    
    @endif
</form>
@endsection