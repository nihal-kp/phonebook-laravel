@extends("master")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="/update/{{$customer->id}}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter full name" name="name" value="{{ $customer->name }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $customer->email }}" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" placeholder="Enter phone number" name="phone" value="{{ $customer->phone }}" required>
            @error("phone")
            <p style="color:red">{{$errors->first("phone")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" class="" placeholder="" name="user_id" value="{{Session::get('user')['id']}}" required>
        </div>
        <a class="btn btn-light m-3" href="/home">Close</a>
        <button type="submit" class="btn btn-primary my-4 mx-3">Save Changes</button>
    </form>
</div>
@endsection