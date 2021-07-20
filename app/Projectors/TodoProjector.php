<?php

namespace App\Projectors;

use App\Events\TodoCreated;
use App\Events\TodoDeleted;
use Illuminate\Support\Facades\DB;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TodoProjector extends Projector
{
    # insertando en la tabla general
    public function onTodoCreated(TodoCreated $event)
    {
        DB::table('todos')->insert($event->todoAttributes);
    }
    # eliminando de tabla general
    public function onTodoDeleted(TodoDeleted $event)
    {
        DB::table('todos')->delete($event->todoAttributes['id']);
    }
}
