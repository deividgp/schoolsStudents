{{$Mode=='create'?'Add student':'Update student'}}
<br>

<label for="name">Name</label>
<input type="text" name="name" id="name" value="{{isset($data->name)?$data->name:''}}" required>
<br>

<label for="surnames">Surnames</label>
<input type="text" name="surnames" id="Surnames" value="{{isset($data->surnames)?$data->surnames:''}}" required>
<br>

<label for="birthdate">Birthdate</label>
<input type="date" name="birthdate" id="birthdate" value="{{isset($data->birthdate)?$data->birthdate:''}}" required>
<br>

<label for="city">City</label>
<input type="text" name="city" id="city" value="{{isset($data->city)?$data->city:''}}">
<br>

<label for="school">School</label>
@if (isset($data->school))
    @foreach ($schools as $school)
        @if ($school->id == $data->school)
            <input list="schools" name="schools" value="{{$school->name}}" id="school">
            @break
        @endif
    @endforeach
@else
    <input list="schools" name="school" value="" id="school">
@endif
    <datalist id="schools">
    @foreach ($schools as $school)
        <option value="{{$school->id}}">{{$school->name}}</option>
    @endforeach

    </datalist>
<br>

<input type="submit" value="{{$Mode=='create'?'Add':'Update'}}">
<a href="{{url('students')}}">Back</a>