<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Teachers';
        $teachers = Teacher::all();

        $context = [
            'teachers' => $teachers,
            'page_title' => $page_title
        ];
        return view('teachers/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Teacher';
        
        $departments = Department::all();

        $context = [
            'page_title' => $page_title,
            'departments' => $departments
        ];
        return view('teachers/create', $context);
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
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Teacher Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'This Email is already registered.',
            'password.required' => 'The Password field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('teachers/create')->withErrors($validator)->withInput();
        }
        // validation end

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'department_id' => $request->input('department_id'),
        ]);

        return redirect('/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Teacher";
        $teacher = Teacher::where('id', '=', $id)->first();
        $departments = Department::all();
       
        $context = [
            'page_title' => $page_title,
            'teacher' => $teacher,
            'departments' => $departments
        ];

        return view('teachers/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::where('id', '=', $id)->first();

        // validation start
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$teacher->user->id],
            'password' => ['required', ""],
            'department_id' => ['required', 'exists:departments,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Teacher Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'This Email is already registered.',
            'password.required' => 'The Password field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('teachers/create')->withErrors($validator)->withInput();
        }
        // validation end

        $user = User::where('id', '=', $teacher->user->id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $teacher
        ->update([
            'department_id' => $request->input('department_id'),
        ]);

    
        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id', '=', $id)->first();
        $user_id = $teacher->user->id;
        $teacher->delete();
        $user = User::where('id', '=', $user_id)->first()->delete();
        
        return redirect('/teachers');
    }
}
