<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Batches';
        $batches = Batch::all();

        $context = [
            'batches' => $batches,
            'page_title' => $page_title
        ];
        return view('batches/index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Batch';

        $context = [
            'page_title' => $page_title
        ];
        return view('batches/create', $context);
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
            'name' => ['required', 'unique:batches'],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The Batch Name field is required.',
            'unique' => 'The Batch Name is already registered.',
        ]);

        if ($validator->fails()) {
            return redirect('batches/create')->withErrors($validator)->withInput();
        }
        // validation end

        Batch::create([
            'name' => $request->input('name')
        ]);

        return redirect('/batches');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Batch";
        $batch = Batch::where('id', '=', $id)->first();
       
        $context = [
            'page_title' => $page_title,
            'batch' => $batch
        ];

        return view('batches/edit', $context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation start
        $rules = [
            'name' => ['required', 'unique:batches,name,'.$id],
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The Batch Name field is required.',
            'unique' => 'The Batch Name is already registered.',
        ]);

        if ($validator->fails()) {
            return redirect('batches/create')->withErrors($validator)->withInput();
        }
        // validation end

        $batch = Batch::where('id', '=', $id)
            ->update([
                'name' => $request->input('name')
            ]);
    
        return redirect('/batches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::where('id', '=', $id)->first()->delete();
        
        return redirect('/batches');
    }
}
