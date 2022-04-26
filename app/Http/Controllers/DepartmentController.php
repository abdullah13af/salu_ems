<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Departments';
        $departments = Department::all();

        $context = [
            'departments' => $departments,
            'page_title' => $page_title
        ];
        return view('departments/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Department';

        $context = [
            'page_title' => $page_title
        ];
        return view('departments/create', $context);
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
            'name' => ['required', 'unique:departments'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The Department Name field is required.',
            'unique' => 'The Department Name is already registered.',
        ]);

        if ($validator->fails()) {
            return redirect('departments/create')->withErrors($validator)->withInput();
        }
        // validation end

        Department::create([
            'name' => $request->input('name')
        ]);

        return redirect('/departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Department";
        $department = Department::where('id', '=', $id)->first();
       
        $context = [
            'page_title' => $page_title,
            'department' => $department
        ];

        return view('departments/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation start
        $rules = [
            'name' => ['required', 'unique:departments,name,'.$id],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The Department Name field is required.',
            'unique' => 'The Department Name is already registered.',
        ]);

        if ($validator->fails()) {
            return redirect('departments/create')->withErrors($validator)->withInput();
        }
        // validation end

        $department = Department::where('id', '=', $id)
            ->update([
                'name' => $request->input('name')
            ]);
    
        return redirect('/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::where('id', '=', $id)->first()->delete();
        
        return redirect('/departments');
    }
}
