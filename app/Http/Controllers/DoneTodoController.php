<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Aggregates\TodoAggregate;
use Illuminate\Support\Facades\DB;

class DoneTodoController extends Controller
{

    public function update(Request $request)
    {
        $aggregateId = Uuid::uuid4();
        $todoId = $request->id;
        $todoTitle = $request->title;
        TodoAggregate::retrieve($aggregateId)->createTodo($todoId, $todoTitle)->persist();
        return back();
    }

    public function destroy(Request $request)
    {
        DB::table('done_todos')->delete($request->id);
        return back();
    }
}
