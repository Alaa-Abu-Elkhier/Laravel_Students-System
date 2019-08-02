@extends('layouts.app')

@section('content')

<div class="container">
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
                   <th>Course</th>
                   <th>Teacher</th>
                   
                   <th></th>
                   </tr>
                   @foreach($students  as $student )
                    <td >{{$student->id}}</td>
                    <td >{{$student->name}}</td>
                    <td>{{$student->degree}}</td>
                    @foreach($student->courses as $course)
                        <td>{{ $course->courseName }}</td>
                      
                        @endforeach
                        @foreach($student->teachers as $teacher)
                        <td>{{ $teacher->teacherName }}</td>
                      
                        @endforeach
                    
                   </tr>
                   @endforeach
                   
                   </table>
                    <a href="{{ url('students/create') }}" class='float-right'>Add Student</a></div>
                   
                   <form class="d-inline" action="{{ url('students' . '/' . $student->id) }}" method="get">
                   
                       
                        @csrf
                        <input type="text"name="id"value="{{ $student->id }}">
                        <input type="submit" value="search">
                    </form>

                   
                   
                   
                   </div>
                 
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection