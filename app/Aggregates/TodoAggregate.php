<?php

namespace App\Aggregates;
//importando los eventos de tareas
use App\Events\TodoCreated;
use App\Events\TodoDeleted;
//uso de aggregate root
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class TodoAggregate extends AggregateRoot
{
    //crear tarea con sus parametros
    public function createTodo(int $id, string $title)
    {
        $this->recordThat(new TodoCreated(['id' => $id, 'title' => $title]));

        return $this;
    }

    //eliminar tarea
    public function deleteTodo(array $todoAttributes)
    {
        $this->recordThat(new TodoDeleted($todoAttributes));

        return $this;
    }
}
