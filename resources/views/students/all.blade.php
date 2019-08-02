@extends('layouts.app')

@section('content')


<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            
                        </div>
                    @endif
                   <div class='content'>
                   <table>
                   <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Degree</th>
                   <th>Update</th>
                   <th>Delete</th>
                   <th>Course</th>
                   <th>Teacher</th>
                  
                   
                   
                   </tr>
                   @foreach($students as $student )
                    <td >{{$student->id}}</td>
                    <td >{{$student->name}}</td>
                    <td>{{$student->degree}}</td>
                   <div class="update"> <td><a class="update" href="{{ url('students' . '/' . $student->id . '/edit') }}" class='float-right'>Update</a></td></div>
                   <div class="delete"> <td><a class="delete"href="{{ url('students' . '/' . $student->id) }}" class='float-right'>Delete</a></td></div>

                    @foreach($student->courses as $course)
                        <td>{{ $course->courseName }}</td>
                      
                        @endforeach
                        @foreach($student->teachers as $teacher)
                        <td>{{ $teacher->teacherName }}</td>
                      
                        @endforeach
                        
                    
                   </tr>
                   @endforeach
                   
                   </table>
                   <div><B>The Avarage :</B> {{ $avg }}</div>
                    <a href="{{ url('students/create') }}" class='float-right'>Add Student</a></div>
                   
                   
                   
                   
                   
                   </div>
                 
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection