<div class="mb-8">
    <h1 class="text-4xl font-black text-gray-700">WATR Challenge To Do List</h1>
    <p class="mb-5 text-gray-500">
        @if (Route::current()->getName() == 'todos.done')
            <a href="/" class="underline">Inicio</a>
        @else
            <a href="{{ route('todos.done') }}" class="underline">Tareas Completadas</a>
        @endif
    </p>
</div>
