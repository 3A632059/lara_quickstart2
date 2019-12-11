<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        return view('tasks.index');

        //由 DB 擷取使用者所有任務
        $tasks = Task::where('user_id', $request->user()->id)->get();


    }
}
