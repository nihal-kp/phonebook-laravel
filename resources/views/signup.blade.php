@extends("master")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="/signup" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter full name" name="name" value="{{ old('name') }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{ old('password') }}" required>
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm password:</label>
            <input type="password" class="form-control" placeholder="Enter password again" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            @error("password")
            <p style="color:red">{{$errors->first("password")}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-4 mx-3">Register</button>
    </form>
</div>
@endsection