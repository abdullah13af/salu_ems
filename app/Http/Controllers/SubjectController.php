<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use App\Rules\UniqueSubjectDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Subjects';
        $subjects = Subject::all();

        $context = [
            'subjects' => $subjects,
            'page_title' => $page_title
        ];
        return view('subjects/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Subject';
        
        $departments = Department::all();

        $context = [
            'page_title' => $page_title,
            'departments' => $departments
        ];
        return view('subjects/create', $context);
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
            'name' => ['required', new UniqueSubjectDepartment($request->input('department_id'), null)],
            'credit_hours' => ['required', 'min:0.1'],
            'semester' => ['required', "in:1, 2, 3, 4, 5, 6, 7, 8"],
            'department_id' => ['required', 'exists:departments,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Subject Name field is required.',
            'credit_hours.required' => 'The Credit Hours field is required.',
            'semester.required' => 'The Semester field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('subjects/create')->withErrors($validator)->withInput();
        }
        // validation end

        // create subject
        Subject::create([
            'name' => $request->input('name'),
            'credit_hours' => $request->input('credit_hours'),
            'semester' => $request->input('semester'),
            'department_id' => $request->input('department_id'),
        ]);

        return redirect('/subjects');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Subject";
        $subject = Subject::where('id', '=', $id)->first();
        $departments = Department::all();
       
        $context = [
            'page_title' => $page_title,
            'subject' => $subject,
            'departments' => $departments
        ];

        return view('subjects/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation start
        $rules = [
            'name' => ['required', new UniqueSubjectDepartment($request->input('department_id'), $id)],
            'credit_hours' => ['required', 'min:0.1'],
            'semester' => ['required', "in:1, 2, 3, 4, 5, 6, 7, 8"],
            'department_id' => ['required', 'exists:departments,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'name.required' => 'The Subject Name field is required.',
            'credit_hours.required' => 'The Credit Hours field is required.',
            'semester.required' => 'The Semester field is required.',
            'department_id.required' => 'The Department field is required.',
            'department_id.exists' => 'The selected Department does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('subjects/create')->withErrors($validator)->withInput();
        }
        // validation end

        $subject = Subject::where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'credit_hours' => $request->input('credit_hours'),
                'semester' => $request->input('semester'),
                'department_id' => $request->input('department_id'),
            ]);
    
        return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::where('id', '=', $id)->first()->delete();
        
        return redirect('/subjects');
    }
}
