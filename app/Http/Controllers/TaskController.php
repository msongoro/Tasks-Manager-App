<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{

    public function index(Request $request){

        $tasks = Tasks::with('projects')->where('user_id', Auth::id())->get();


            return view('dashboard.tasks-list', ['tasks'=>$tasks]);
        }


         public function create(){

            $projects = Projects::where('user_id', Auth::id())->get();
            return view('dashboard.tasks-add', ['projects'=>$projects]);
        }


    public function store(Request $request){

         $validatedData =   $request->validate([
             'title'=>'required',
             'description'=>'required',
             'priority' => 'required|in:low,medium,high',
             'status' => 'required|in:pending,in_progress,completed',
             'project_id' => 'required',
             'due_date' => 'required|date|after:today'
         ]);

         try {
            $user_id = Auth::id();

         Tasks::create([
            'user_id' => $user_id,
            'project_id' =>Projects::where('id', $request->project_id)->first()->id,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'due_date' =>Carbon::parse($request->due_date),

        ]);

                $tasks = Tasks::with('projects')->where('user_id', Auth::id())->get();
                return view('dashboard.tasks-list', ['tasks'=>$tasks]);

            }
            catch (\Throwable $th) {
                return back()->with('error', 'An error occurred');
         }

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

            public function destroy($id)
            {
                $tasks = Tasks::findOrFail($id);
                $tasks->delete();
                return back()->with('success', 'Task deleted successfully');
            }
}
