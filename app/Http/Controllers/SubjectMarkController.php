<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectMark;
use Illuminate\Http\Request;

class SubjectMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $page_title = "Manage Students Marks";
        $subjects_marks = SubjectMark::where("subject_id", "=", $id)->get();
        
        $context = [
            'page_title' => $page_title,
            'subjects_marks' => $subjects_marks
        ];

        return view('subjects_marks/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $subjects_marks = SubjectMark::where("subject_id", "=", $subject_id)->get();

        for($i=0; $i<$subjects_marks->count(); $i++) {
            $subjects_marks[$i]
            ->update([
                'mid_marks' => $request->input('mid_marks'.$subjects_marks[$i]->id),
                'sessional_marks' => $request->input('sessional_marks'.$subjects_marks[$i]->id),
                'practical_marks' => $request->input('practical_marks'.$subjects_marks[$i]->id),
                'final_marks' => $request->input('final_marks'.$subjects_marks[$i]->id),
            ]);
            error_log('updating subjectsmarks...');
        }
        $url = "/subjects_marks/" . $subject_id;
        return redirect($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectMark  $subjectMark
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectMark $subjectMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectMark  $subjectMark
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectMark $subjectMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectMark  $subjectMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectMark $subjectMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectMark  $subjectMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectMark $subjectMark)
    {
        //
    }
}
