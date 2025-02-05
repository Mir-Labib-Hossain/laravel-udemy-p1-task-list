@extends('layouts.app')
<div>
    @section('title', 'Task List')
    @section('content')
        <a href="{{ route('create.view') }}">
            <button class="btn btn-green">
                Create
            </button>

        </a>
        <ul>
            @forelse ($tasks as $task)
                <li>
                    <a href='{{ route('details.view', ['task' => $task->id]) }}' @class(['link', 'font-bold', 'line-through' => $task->completed])>
                        {{ $task->title }}
                    </a>
                </li>
            @empty
                <p>Empty</p>
            @endforelse
        </ul>
        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    @endsection

</div>
