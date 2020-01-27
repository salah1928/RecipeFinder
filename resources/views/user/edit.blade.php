<form action="{{ route('updateuser', $id) }}" enctype="multipart/form-data" method="POST" name="userupdate">
@csrf
@method('PATCH')
    <input name="name" type="text" value="{{$name}}">
    <input name="email" type="text" value="{{$email}}">
    <input name="city" type="text" value="{{$city}}">
    <input name="gender" type="text" value="{{$gender}}">
    <input name="age" type="number" value="{{$age}}">
    <input name="image" type="file">
    <button type="submit">Edit</button>
</form>