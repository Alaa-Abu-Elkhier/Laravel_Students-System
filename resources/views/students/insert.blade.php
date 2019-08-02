@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Data Insertion</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            
                        </div>
                    @endif
                    <form method="POST"  action="{{url ('students')}}">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="degree"placeholder="Degree">
                    <input type="text" name="teacherName"placeholder="Teacher Name">
                    <input type="checkbox" name="courseName" value="English"> English<br>
                    <input type="checkbox" name="courseName" value="Math">Math<br>
                    <input type="checkbox" name="courseName" value="Science" >Science<br>

                    <input type="submit" name="send" value="send data">
                    </form>
            
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
