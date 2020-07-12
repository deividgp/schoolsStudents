@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('/students')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}

        @include('students.form', ['Mode'=>'create'])
    </form>
</div>
@endsection