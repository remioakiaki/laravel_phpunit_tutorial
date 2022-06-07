<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = [
            (object) ['id' => 10, 'title' => 'テストタスク', 'executed' => false],
        ];

        return view('tasks.index', ['tasks' => $tasks]);
    }
}
