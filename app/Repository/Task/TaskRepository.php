<?php


namespace App\Repository\Task;


use App\Models\Task;
use App\Models\User;
use App\Repository\Task\Contract\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TaskRepository implements TaskRepositoryInterface
{

    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
       $path = $request->file('image')->store('images', 'public');

        $newTask = new Task();
        $newTask->complete = false;
        $newTask->repeat_type = $request->repeat_type;
        $newTask->task_description = $request->task_description;
        $newTask->time_to_completion = $request->time_to_completion;
        $newTask->image = $path;
        $newTask->save();

        Auth::user()->tasks()->attach($newTask->id);

        return response()->json('success', Response::HTTP_CREATED);
    }

    public function update(int $id, Request $request)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
