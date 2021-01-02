@extends("master")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    <table class="table">
    <tr>
        <th><h3>Contacts</h3></th> <th></th> <th></th> <th><a class="btn btn-success" href="/create">New Contact</a></th>
    </tr>
    <tr>
        <th>Name</th> <th>Email</th> <th>Phone</th> <th></th>
    </tr>
    @foreach($phonebook as $customer)
    <tr>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>
        <td>
            <a class="btn btn-light" href="/edit/{{$customer->id}}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-danger" href="/delete/{{$customer->id}}" onclick="return confirm('Are you sure you want to remove this customer?');"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
    </table>
</div>
@endsection