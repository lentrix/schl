<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        if($search) {
            $students = Student::where('lname','like',"%$search%")
                    ->orWhere('mname','like',"%$search%")
                    ->orWhere('fname','like',"%$search%")
                    ->orderBy('lname')->orderBy('fname')->get();
        }else {
            $students = null;
        }
        
        return view('students.index', ['students'=>$students, 'search'=>$search]);
    }

    public function findLRN() {
        $student = Student::where('lrn','=',$_POST['lrn'])->first();
        if($student) {
            return redirect("students/$student->id");
        }else {
            return redirect('students')->withErrors('LRN not found.');
        }
    }

    public function findID() {
        $student = Student::where('id',$_POST['id'])->first();
        if($student) {
            return redirect("students/$student->id");
        }else {
            return redirect('students')->withErrors('ID Number not found.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id'=>'required',
            'lname'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'gender'=>'required',
            'bdate'=>'required|date',
            'barangay' =>'required',
            'town' => 'required',
            'province' => 'required'
        ]);

        $student = Student::create($request->all());
        return redirect("students/$student->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('id',$id)->first();
        return view('students.view',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        return view('students.edit', ['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id'=>'required',
            'lname'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'gender'=>'required',
            'bdate'=>'required|date',
            'barangay' =>'required',
            'town' => 'required',
            'province' => 'required'
        ]);

        $student = Student::where('id', $id)->first();
        $student->update($request->all());
        return redirect("/students/$student->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $student = Student::find($id);
        // $student->delete();
    }
}
