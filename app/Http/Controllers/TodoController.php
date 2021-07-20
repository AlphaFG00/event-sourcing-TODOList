<?php

namespace App\Http\Controllers;

use App\Aggregates\TodoAggregate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $aggregateId = Uuid::uuid4();
        $id = rand(1000, 9999);
        TodoAggregate::retrieve($aggregateId)->createTodo($id, $request->title)->persist();
        return back();
    }

    public function destroy(Request $request)
    {
        $aggregateId = Uuid::uuid4();
        $todo = DB::table('todos')->where('id',$request->todoId)->first();
        $todoAttributes = [
            'id' => $todo->id,
            'title' => $todo->title
        ];
        TodoAggregate::retrieve($aggregateId)->deleteTodo($todoAttributes)->persist();
        return back();
    }
}
