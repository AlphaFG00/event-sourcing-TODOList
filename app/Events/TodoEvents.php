<?php

namespace App\Events;
//usando SouldbeStored para comenzar a guardar los estados
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

//creando una tarea y guardando el estado
class TodoCreated extends ShouldBeStored
{
    /** @var array */

    public $todoAttributes;

    //construyendo tarea con sus atributos

    public function __construct(array $todoAttributes)
    {
        $this->todoAttributes = $todoAttributes;
    }
}

//creando una tarea y guardando el estado
class TodoDeleted extends ShouldBeStored
{
    /** @var int */
    public $todoAttributes;

    public function __construct(array $todoAttributes)
    {
        $this->todoAttributes = $todoAttributes;
    }
}
