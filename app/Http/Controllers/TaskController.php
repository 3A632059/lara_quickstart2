<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        //回傳視圖，可看到輸入任務的表單
//        return view('tasks.index');

        //由 DB 擷取使用者所有任務
        //$tasks = Task::where('user_id', $request->user()->id)->get();

        // 取得登入之User的所有tasks
        //$tasks= auth()->user()->tasks;

        //測試 認證->使用者->任務->get
        //$tasks= auth()->user()->tasks()->get();

        //取得登入之User的所有tasks_2
        //$tasks=Auth::user()->tasks;

        //測試 認證->使用者->任務->get_2
        $tasks=Auth::user()->tasks()->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);


    }


    public function store(Request $request)
    {
        //建立新任務
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }


}
