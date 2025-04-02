<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use App\Models\Projects;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $taskStatuses = ['pending', 'completed'];
        $users = User::all();
        $tasks = Tasks::with('projects')->where('user_id', Auth::id())->get();
        $projects = Projects::where('user_id', Auth::id())->get();
        $tasksCount = Tasks::where('user_id', auth()->id())
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy('status')
            ->pluck('count', 'status');

        $tasksCount = array_merge(array_fill_keys($taskStatuses, 0), $tasksCount->toArray());
        return view('home',['users'=>$users,'tasks'=>$tasks,'projects'=>$projects,'tasksCount'=>$tasksCount]);
    }
}
