<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Projects::where('user_id', Auth::id())->get();
        return view('dashboard.projects-list',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.projects-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =   $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status' => 'required|in:pending,in_progress,completed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:today',
            'due_date' => 'required|date|after:today'
        ]);



         try {
            $user_id = Auth::id();
            Projects::create([
                'user_id' => $user_id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'due_date' =>Carbon::parse($request->due_date),
                'start_date' =>Carbon::parse($request->start_date),
                'end_date' =>Carbon::parse($request->end_date),
            ]);
                $projects = Projects::where('user_id', Auth::id())->get();
                return view('dashboard.projects-list',['projects'=>$projects])->with('success', 'Project created successfully');

            } catch (\Throwable $th) {
                return back()->with('error', 'An error occurred while creating project');
            }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Projects::findOrFail($id);
        $projects->delete();
        return back()->with('success', 'Project deleted successfully');
    }
}
