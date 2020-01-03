<h1>Update Student</h1>

<form action="{{route('student.update',[$data->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('put')
    <label>First Name :</label>
    <input name="first_name" value="{{$data->first_name}}" required>
    <label>Last Name :</label>
    <input name="last_name" value="{{$data->last_name}}"  required>
    <label>Student Image:</label>
    <input name="image_path" type="file" required>
    <label>Date Of barth</label>
    <input  name="date_of_berth" value="{{$data->date_of_berth}}" type="Date" required>
    <input type="submit" value="submit">
</form>