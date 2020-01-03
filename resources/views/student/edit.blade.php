

<h1>Create Student</h1>

<form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    <label>First Name :</label>
    <input name="first_name"  required>
    <label>Last Name :</label>
    <input name="last_name"  required>
    <label>Student Image:</label>
    <input name="image_path" type="file" required>
    <label>Date Of barth</label>
    <input  name="date_of_berth" type="Date" required>
    <input type="submit" value="submit">
</form>