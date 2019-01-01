<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = null;

        if(isset($_GET['search'])) {
            $teachers = Teacher::where('lname','like',"%{$_GET['search']}%")
                    ->orWhere('fname','like',"%{$_GET['search']}%")
                    ->orWhere('mname','like',"%{$_GET['search']}%")
                    ->orderByRaw('lname, fname')
                    ->get();
        }

        if(isset($_GET['specialty'])) {
            $teachers = Teacher::where('specialty', $_GET['specialty'])
                ->orderByRaw('lname, fname')
                ->get();
        }
        
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'specialty' => 'required',
            'title' => 'required',
            'dept_id' => 'required|integer'
        ]);

        $teacher = Teacher::create($request->all());

        return redirect("/teachers/$teacher->id");      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers/view', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher)
    {
        $this->validate(request(), [
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'specialty' => 'required',
            'title' => 'required',
            'dept_id' =>'required|integer',
        ]);

        $teacher->update([
            'lname' => request('lname'),
            'fname' => request('fname'),
            'mname' => request('mname'),
            'specialty' => request('specialty'),
            'dept_id' => request('dept_id'),
            'title' => request('title')
        ]);
        
        session()->flash('info', 'Teacher has been updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        return redirect()->back();
    }

    public function setActive(Teacher $teacher) {
        $teacher->active = request('active');
        $teacher->save();
        return redirect()->back();
    }
}
