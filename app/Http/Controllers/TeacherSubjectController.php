<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\TeacherSubject;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeacherSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Teachers Subject';
        $teachers_subjects = TeacherSubject::all();

        $context = [
            'teachers_subjects' => $teachers_subjects,
            'page_title' => $page_title
        ];
        return view('teachers_subjects/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Teacher Subject';
        
        $departments = Department::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $batches = Batch::all();

        $context = [
            'page_title' => $page_title,
            'departments' => $departments,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'batches' => $batches
        ];
        return view('teachers_subjects/create', $context);
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
        $max_year = date("Y");
        $rules = [
            'year' => ['required', "integer", "between:2017,$max_year"],
            'semester' => ['required'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'batch_id' => ['required', 'exists:batches,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'semester.required' => 'The Semester field is required.',
            'teacher_id.required' => 'The Teacher field is required.',
            'subject_id.required' => 'The Subject field is required.',
            'batch_id.required' => 'The Batch field is required.',
            'teacher_id.exists' => 'The selected Teacher does not exists.',
            'subject_id.exists' => 'The selected Subject does not exists.',
            'batch_id.exists' => 'The selected Batch does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('teachers_subjects/create')->withErrors($validator)->withInput();
        }
        // validation end

        TeacherSubject::create([
            'subject_id' => $request->input('subject_id'),
            'batch_id' => $request->input('batch_id'),
            'teacher_id' => $request->input('teacher_id'),
            'year' => $request->input('year'),
            'semester' => $request->input('semester'),
        ]);

        return redirect('/teachers_subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherSubject  $teacherSubject
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherSubject  $teacherSubject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Teacher Subject";
        $teacher_subject = TeacherSubject::where('id', '=', $id)->first();
        $departments = Department::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $batches = Batch::all();
       
        $context = [
            'page_title' => $page_title,
            'teacher_subject' => $teacher_subject,
            'departments' => $departments,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'batches' => $batches,
        ];

        return view('teachers_subjects/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherSubject  $teacherSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation start
        $max_year = date("Y");
        $rules = [
            'year' => ['required', "integer", "between:2017,$max_year"],
            'semester' => ['required'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'batch_id' => ['required', 'exists:batches,id'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'semester.required' => 'The Semester field is required.',
            'teacher_id.required' => 'The Teacher field is required.',
            'subject_id.required' => 'The Subject field is required.',
            'batch_id.required' => 'The Batch field is required.',
            'teacher_id.exists' => 'The selected Teacher does not exists.',
            'subject_id.exists' => 'The selected Subject does not exists.',
            'batch_id.exists' => 'The selected Batch does not exists.',
        ]);

        if ($validator->fails()) {
            return redirect('teachers_subjects/create')->withErrors($validator)->withInput();
        }
        // validation end

        TeacherSubject::where('id', '=', $id)
        ->update([
            'subject_id' => $request->input('subject_id'),
            'batch_id' => $request->input('batch_id'),
            'teacher_id' => $request->input('teacher_id'),
            'year' => $request->input('year'),
            'semester' => $request->input('semester'),
        ]);

        return redirect('/teachers_subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherSubject  $teacherSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeacherSubject::where('id', '=', $id)->first()->delete();

        return redirect('/teachers_subjects');
    }
}
