<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Batch;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Students';
        $students = Student::all();

        $context = [
            'students' => $students,
            'page_title' => $page_title
        ];
        return view('students/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Student';
        
        $departments = Department::all();
        $batches = Batch::all();

        $context = [
            'page_title' => $page_title,
            'departments' => $departments,
            'batches' => $batches
        ];
        return view('students/create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation start
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', ""],
            'department_id' => ['required', 'exists:departments,id'],
            'batch_id' => ['required', 'exists:batches,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Student Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'This Email is already registered.',
            'password.required' => 'The Password field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
            'batch_id.required' => 'The Batch field is required.',
            'batch_id.exists' => 'The selected Batch does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('students/create')->withErrors($validator)->withInput();
        }
        // validation end

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Student::create([
            'user_id' => $user->id,
            'department_id' => $request->input('department_id'),
            'batch_id' => $request->input('batch_id'),
        ]);

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Student";
        $student = Student::where('id', '=', $id)->first();
        $departments = Department::all();
        $batches = Batch::all();
       
        $context = [
            'page_title' => $page_title,
            'student' => $student,
            'departments' => $departments,
            'batches' => $batches
        ];

        return view('students/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id', '=', $id)->first();

        // validation start
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$student->user->id],
            'password' => ['required', ""],
            'department_id' => ['required', 'exists:departments,id'],
            'batch_id' => ['required', 'exists:batches,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Student Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'This Email is already registered.',
            'password.required' => 'The Password field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
            'batch_id.required' => 'The Batch field is required.',
            'batch_id.exists' => 'The selected Batch does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('students/create')->withErrors($validator)->withInput();
        }
        // validation end

        $user = User::where('id', '=', $student->user->id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $student
        ->update([
            'department_id' => $request->input('department_id'),
            'batch_id' => $request->input('batch_id'),
        ]);

    
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', '=', $id)->first();
        $user_id = $student->user->id;
        $student->delete();
        $user = User::where('id', '=', $user_id)->first()->delete();
        
        return redirect('/students');
    }
}
