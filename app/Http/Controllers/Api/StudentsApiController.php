<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
class StudentsApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $avg = Student::avg('degree');
     return response()->json(['Students' => Student::all()->withAvg($avg)]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student=student::create(['name'=>request('name'),'degree'=>request('degree'),'courseName'=>request('courseName')]);
        $course= Course::create(['courseName'=>request('courseName')]);
        $teacher=Teacher::create(['teacherName'=>request('teacherName')]);
        $student->courses()->attach($course);
        $student->teachers()->attach($teacher);

        return response()->json([
         'Student'  =>  $student -> toArray(),
         'Course'   =>  $course  -> toArray(),
         'Teacher'  =>  $teacher -> toArray()
         
          
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    
    {
      
        return response()->json(['Student' => $student->toArray()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) {
      return response()->json(['Student' => $student->toArray()]);
    }
   
   


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $student->name = $request->name;
        $student->degree = $request->degree;
        $student->save();
        return response()->json(['Student' => $student->toArray()]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) {

        $student->delete();
        return response()->json(['message'=>'Student successfully deleted']);
      
      }
}


