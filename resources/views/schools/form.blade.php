{{$Mode=='create'?'Add school':'Update school'}}
<br>

<label for="name">Name</label>
<input type="text" name="name" id="name" value="{{isset($data->name)?$data->name:''}}" required>
<br>

<label for="address">Address</label>
<input type="text" name="address" id="address" value="{{isset($data->address)?$data->address:''}}" required>
<br>

@if (isset($data->logo))
    <img src="{{asset('storage').'/'.$data->logo}}" alt="Not available" width="200" height="200">
    <br>
@endif

<label for="logo">Logo</label>
<input type="file" name="logo" id="logo">
<br>

<label for="email">Email</label>
<input type="email" name="email" id="email" value="{{isset($data->email)?$data->email:''}}">
<br>

<label for="phone">Phone number</label>
<input type="tel" name="phone" id="phone" value="{{isset($data->phone)?$data->phone:''}}">
<br>

<label for="web">Web page</label>
<input type="text" name="web" id="web" value="{{isset($data->web)?$data->web:''}}">
<br>

<input type="submit" value="{{$Mode=='create'?'Add':'Update'}}">
<a href="{{url('schools')}}">Back</a>