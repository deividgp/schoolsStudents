@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url('students/create')}}">New student</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Index</th>
                <th>Name</th>
                <th>Surnames</th>
                <th>Birthdate</th>
                <th>City</th>
                <th>School</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->surnames}}</td>
                    <td>{{$student->birthdate}}</td>
                    <td>{{$student->city}}</td>
                    <td>
                        @foreach ($schools as $school)
                            @if ($school->id == $student->school)
                                {{$school->name}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form action="{{url('/students/'.$student->id.'/edit')}}" style="display:inline">
                            <button type="submit">Edit</button>
                        </form>
                        
                        <form method="POST" action="{{url('/students/'.$student->id)}}" style="display:inline">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$students->links()}}
</div>
@endsection