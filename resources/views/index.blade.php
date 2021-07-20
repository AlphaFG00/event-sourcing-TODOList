@extends('layouts.app')

@section('content')
    <div class="w-5/12 mx-auto">
        <x-header />

        <ul class="divide-y divide-gray-200 mb-8">
            @foreach ($todos as $todo)
                <x-todo :todo="$todo" />
            @endforeach
        </ul>


        <form action="{{ route('todo.create') }}" method="post"
            class="shadow-md rounded overflow-hidden focus-within:ring focus-within:border-blue-300 flex">
            @csrf
            <input type="text" placeholder="Tarea" name="title" class="p-2 focus:outline-none w-9/12" />
            <input type="submit" value="Agregar"
                class="px-4 py-2 w-3/12 cursor-pointer bg-gray-800 text-gray-50 hover:bg-gray-700 font-medium">
        </form>
    </div>

@endsection
