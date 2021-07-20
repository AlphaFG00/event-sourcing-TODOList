@props(['todo' => $todo])

<div class="flex px-2 py-4 justify-between w-100 text-gray-700 hover:text-gray-200 hover:bg-gray-700">
    <p>{{ $todo->title }}</p>
    <form method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $todo->id }}">
        <input type="hidden" name="title" value="{{ $todo->title }}">
        <button type="submit" class="underline" formaction="{{ route('todo.restore') }}">
            Regresar a Pendiente
        </button>
        <span class="mx-2">|</span>
        <button type="submit" class="underline" formaction="{{ route('todo.delete') }}">
            Borrar
        </button>
    </form>
</div>
