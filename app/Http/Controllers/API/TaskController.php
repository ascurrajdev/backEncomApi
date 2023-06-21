<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskMultipleRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request){
        $tasks = Task::query();
        foreach($request->input('filters',[]) as $filter => $value){
            $tasks->{$filter}($value);
        }
        return TaskResource::collection($tasks);
    }

    public function store(CreateTaskMultipleRequest $request){
        $params = $request->validated();
        $tasks = Task::insert($params['tasks']);
        return TaskResource::collection($tasks);
    }

    public function delete(Task $task){
        $task->delete();
        return new TaskResource($task);
    }
}