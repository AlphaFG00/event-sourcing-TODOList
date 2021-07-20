<?php

namespace App\Reactors;

use App\Events\TodoCreated;
use App\Events\TodoDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
//implementando reactores
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;


class TodoDoneReactor extends Reactor implements ShouldQueue
{
    #pasar una tarea pendiente a completado
    public function onTodoDeleted(TodoDeleted $event)
    {
        $id = $event->todoAttributes['id'];
        $title = $event->todoAttributes['title'];
        DB::table('done_todos')->insert(
            [
                'id' => $id,
                'title' => $title
            ]
        );
    }

    #pasar una tarea completada a pendiente de nuevo
    public function onTodoCreated(TodoCreated $event)
    {
        $doneTodo = DB::table('done_todos')->where('id', '=', $event->todoAttributes['id'])->first();
        if ($doneTodo)
            DB::table('done_todos')->delete($doneTodo->id);
    }
}
