@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url('schools/create')}}">New school</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Index</th>
                <th>Name</th>
                <th>Address</th>
                <th>Logo</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Web page</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$school->name}}</td>
                    <td>{{$school->address}}</td>
                    <td>
                        <img src="{{asset('storage').'/'.$school->logo}}" alt="Not available" width="200" height="200">
                    </td>
                    <td>{{$school->email}}</td>
                    <td>{{$school->phone}}</td>
                    <td>{{$school->web}}</td>
                    <td>
                        <form action="{{url('/schools/'.$school->id.'/edit')}}" style="display:inline">
                            <button type="submit">Edit</button>
                        </form>
                        
                        <form method="POST" action="{{url('/schools/'.$school->id)}}" style="display:inline">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$schools->links()}}
</div>
@endsection