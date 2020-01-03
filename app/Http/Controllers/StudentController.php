<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\interfaces\CrudInterface;
use App\repository\CrudRepository;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CrudInterface $crud
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function index(CrudInterface $crud,Student $student )
    {
        //
        $data=$crud->getAllData($student);
        return view('student.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentRequest $request
     * * @param CrudInterface $crud
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request,CrudInterface $crud,Student $student)
    {
        //
        $crud->store($request,$student);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param $student
     * @param CrudInterface $crud
     * @param  \App\Student  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($student,CrudInterface $crud,Student $students)
    {

      $data= $crud->getById($students,$student);
      return view('student.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $student
     * @param  StudentRequest  $request
     * @param  \App\Student  $students
     * @param CrudInterface $crud
     * @return \Illuminate\Http\Response
     */
    public function update($student,StudentRequest $request, Student $students,CrudInterface $crud)
    {
        $crud->update($request,$student,$students);
        return redirect()->route('student.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $student
     * @param  \App\Student  $students
     * @param  CrudInterface $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($student,Student $students,CrudInterface $crud)
    {
        //
        $crud->delete($student,$students);
        return redirect()->route('student.index');

    }
}
