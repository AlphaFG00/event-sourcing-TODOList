@props(['todo' => $todo])

<div class="flex px-2 py-4 justify-between w-100 text-gray-700 hover:text-gray-200 hover:bg-gray-700">
    <p>{{ $todo->title }}</p>
    <form action="{{ route('todo.done') }}" method="post">
        @csrf
        <input type="hidden" name="todoId" value="{{ $todo->id }}">
        <button type="submit" class="bg-green-500 text-gray-50 px-2 rounded-full hover:bg-green-800">
            <i class="fa fa-check"></i>
        </button>
    </form>
</div>
