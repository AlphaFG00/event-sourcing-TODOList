@extends('layouts.app')

@section('content')
    <div class="w-5/12 mx-auto">
        <x-header />

        <h4 class="text-md mb-8">Tareas marcadas como completadas</h4>

        <ul class="divide-y divide-gray-200 mb-8">
            @foreach ($todos as $todo)
                <x-todo-done :todo="$todo" />
            @endforeach
        </ul>
    </div>

@endsection
