
<a href="{{route('student.create')}}">Add Student</a>
<br>
@foreach($data as $student)
    {{$student}} <div><a href="{{route('student.edit',[$student])}}">Edit</a>
    <form method="post" action="{{route('student.destroy',$student)}}">
        @method('delete')
        @csrf
        <input type="submit" value="delete">
    </form>
    </div>
@endforeach